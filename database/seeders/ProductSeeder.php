<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function grt_cat_img_name($val) {
        if ($val === "Красота") return Storage::url("krasota.jpg");
        if ($val === "Гигиена") return Storage::url("gigiena.jpg");
        if ($val === "Здоровье") return Storage::url("zdorovie.jpg");
        return "";
    }

    public function grt_brand_img_name($val) {
        if ($val === "bastofindia") return Storage::url("bastofindia.jpg");
        if ($val === "dabur") return Storage::url("dabur.jpg");
        if ($val === "himalaya") return Storage::url("himalaya.jpg");
        if ($val === "maharishi") return Storage::url("maharishi.jpg");
        return "";
    }

    public function run()
    {

        Storage::disk('public')->put("zdorovie.jpg", file_get_contents(public_path('img/faker_img/zdorovie.jpg')), 'public');
        Storage::disk('public')->put("gigiena.jpg", file_get_contents(public_path('img/faker_img/gigiena.jpg')), 'public');
        Storage::disk('public')->put("krasota.jpg", file_get_contents(public_path('img/faker_img/krasota.jpg')), 'public');

        Storage::disk('public')->put("bastofindia.jpg", file_get_contents(public_path('img/faker_img/bastofindia.jpg')), 'public');
        Storage::disk('public')->put("dabur.jpg", file_get_contents(public_path('img/faker_img/dabur.jpg')), 'public');
        Storage::disk('public')->put("himalaya.jpg", file_get_contents(public_path('img/faker_img/himalaya.jpg')), 'public');
        Storage::disk('public')->put("maharishi.jpg", file_get_contents(public_path('img/faker_img/maharishi.jpg')), 'public');

        $files = base_path() . '/public/tovars/tovars_v1.csv';
        $row = 0;

        $categories = [];
        $brands = [];

        if (($handle = fopen($files, "r")) !== FALSE) {
            echo  $files."\n\r";
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ($row == 0) {$row++; continue;}

                    if (empty($data) || empty($data[0])) continue;

                    $fcontent = @file_get_contents($data[4]);

                    if (empty($fcontent)&&(!empty($data[5])))
                        $fcontent = @file_get_contents($data[5]);

                    if (empty($fcontent)&&(!empty($data[6])))
                        $fcontent = @file_get_contents($data[6]);

                    if (!empty($fcontent)) {
                        $img_name = basename($data[4]);
                        Storage::disk('public')->put($img_name, $fcontent, 'public');
                        $ins_url = Storage::url($img_name);
                    } else {
                        $ins_url = "";
                    }

                    $one_row = [
                        'sku' => 'tov_'.$row,
                        'title' => mb_convert_encoding($data[0], "utf-8", "windows-1251"),
                        'slug' => '',
                        'description' => text_formater(mb_convert_encoding($data[1], "utf-8", "windows-1251")),
                        'price' => str_replace(",",".",doubleval ($data[2])),
                        'old_price' => str_replace(",",".",doubleval ($data[3])),
                        'img' => $ins_url,
                        'hit' => rand(0,1)?true:false,
                        'new' => rand(0,1)?true:false,
                        'category' => mb_convert_encoding($data[7], "utf-8", "windows-1251"),
                        'brand' => mb_convert_encoding($data[8], "utf-8", "windows-1251"),
                    ];


                    $product_id = Product::create($one_row);
                    echo $product_id->id ." -> ". $one_row['title']."\n\r";


                    $categories[$one_row['category']] = [
                        'title' => $one_row['category'],
                        'slug' => "",
                        'description' => "Описание категории: ".$one_row['category'],
                        'img' => $this->grt_cat_img_name($one_row['category'])
                    ];

                    $brands[$one_row['brand']] = [
                        'title' => $one_row['brand'],
                        'slug' => "",
                        'description' => "Описание категории: ".$one_row['brand'],
                        'img' => $this->grt_brand_img_name($one_row['brand'])
                    ];


                    if (!empty($data[5])) {
                        $fcontent = @file_get_contents($data[5]);

                        if (!empty($fcontent)) {
                            $img_name = basename($data[5]);
                            Storage::disk('public')->put($img_name, $fcontent, 'public');

                            ProductImage::create([
                                'product_id' =>$product_id->id,
                                'link' => Storage::url($img_name),
                                'alt'=> $one_row['title'],
                                'title'=> $one_row['title'],
                            ]);
                        }

                    }

                    if (!empty($data[6])) {
                        $fcontent = @file_get_contents($data[6]);

                        if (!empty($fcontent)) {
                            $img_name = basename($data[6]);
                            Storage::disk('public')->put($img_name, $fcontent, 'public');

                            ProductImage::create([
                                'product_id' =>$product_id->id,
                                'link' => Storage::url($img_name),
                                'alt'=> $one_row['title'],
                                'title'=> $one_row['title'],
                            ]);
                        }

                    }



                    // var_dump($one_row);

                    if (empty($data[0])) continue;

                    // $rez = DB::table('products')->where('sku', $sku)->update(['price' => $price, "insklad" => $count, "price_old" => 0]);
                $row++;
            }

        fclose($handle);


        foreach($categories as $element)
        {
            $cat_id = Category::create($element);
            echo $cat_id->id."\n\r";
        }

        foreach($brands as $element)
        {
            $brand_id = Brand::create($element);
            echo $brand_id->id."\n\r";
        }

        // unlink($dir."/".$files);
        }
    }
}
