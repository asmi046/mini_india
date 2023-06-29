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

use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function title_replace($val) {
        $rez = $val;

        if ($val === "Здоровье") return "Аюрведа";

        return $rez;
    }

    public function grt_brand_img_name($val) {

        if ($val === "Aimil") return Storage::url("aimil.jpg");
        if ($val === "Al-Rehab") return Storage::url("al_rehab.jpg");
        if ($val === "Albert David") return Storage::url("albert_david.jpg");
        if ($val === "Alsu") return Storage::url("alsu.jpg");
        if ($val === "Amil") return Storage::url("amil.jpg");
        if ($val === "Baidyanath") return Storage::url("baidyanath.jpg");
        if ($val === "Balm") return Storage::url("balm.jpg");
        if ($val === "Blue Heaven") return Storage::url("blue_heaven.jpg");
        if ($val === "Brooke Bond") return Storage::url("brooke_bond.jpg");
        if ($val === "Charak") return Storage::url("charak.jpg");
        if ($val === "Cipla") return Storage::url("cipla.jpg");
        if ($val === "Dabur") return Storage::url("dabur.jpeg");
        if ($val === "Dey's") return Storage::url("days.jpg");
        if ($val === "Divya") return Storage::url("divya.jpg");
        if ($val === "Dr Ortho") return Storage::url("dr_ortho.jpg");
        if ($val === "Emami") return Storage::url("emami.jpg");
        if ($val === "Everest") return Storage::url("everest.jpg");
        if ($val === "Gomata") return Storage::url("gomata.jpg");
        if ($val === "Hamdard") return Storage::url("hamdard.jpg");
        if ($val === "HEM") return Storage::url("hem.jpg");
        if ($val === "Hemani") return Storage::url("hemani.jpg");
        if ($val === "Himalaya") return Storage::url("himalaya.jpg");
        if ($val === "Indian Khadi") return Storage::url("indian_khadi.jpg");
        if ($val === "Indulekha") return Storage::url("indulekha.jpg");
        if ($val === "Jagat Pharma") return Storage::url("jagat_pharma.jpg");
        if ($val === "Kailash Jeevan") return Storage::url("kailash-jeevan.jpg");
        if ($val === "Vicco") return Storage::url("vicco.jpg");
        if ($val === "Maharishi Ayurveda") return Storage::url("maharishi.jpg");
        if ($val === "Nagarjuna") return Storage::url("nagarjuna.jpg");
        if ($val === "Kottakkal") return Storage::url("kottakkal.jpg");
        if ($val === "Jyothy") return Storage::url("jyothy.jpg");
        if ($val === "Nirdosh") return Storage::url("nirdosh.jpg");
        if ($val === "Satya") return Storage::url("satya.jpg");
        if ($val === "Zandu") return Storage::url("zandu.jpg");
        if ($val === "Organic India") return Storage::url("organic-india.jpg");
        if ($val === "Supradyn") return Storage::url("supradyn.jpg");
        if ($val === "Patanjali") return Storage::url("patanjali.jpg");
        if ($val === "Sri Sri tattva") return Storage::url("sri-sri.jpg");
        if ($val === "Sri Sri Tattva") return Storage::url("sri-sri.jpg");
        if ($val === "Vasu") return Storage::url("vasu.jpg");
        if ($val === "Sun Pharma") return Storage::url("sun-pharma.jpg");
        if ($val === "Yogi Ayurvedic") return Storage::url("yogy.jpg");

        return "";
    }


    public function run()
    {
        Storage::disk('public')->put("aimil.jpg", file_get_contents(public_path('img/faker_img/brands/aimil.jpg')), 'public');
        Storage::disk('public')->put("al_rehab.jpg", file_get_contents(public_path('img/faker_img/brands/al_rehab.jpg')), 'public');
        Storage::disk('public')->put("albert_david.jpg", file_get_contents(public_path('img/faker_img/brands/albert_david.jpg')), 'public');
        Storage::disk('public')->put("alsu.jpg", file_get_contents(public_path('img/faker_img/brands/alsu.jpg')), 'public');
        Storage::disk('public')->put("amil.jpg", file_get_contents(public_path('img/faker_img/brands/amil.jpg')), 'public');
        Storage::disk('public')->put("baidyanath.jpg", file_get_contents(public_path('img/faker_img/brands/baidyanath.jpg')), 'public');
        Storage::disk('public')->put("balm.jpg", file_get_contents(public_path('img/faker_img/brands/balm.jpg')), 'public');
        Storage::disk('public')->put("blue_heaven.jpg", file_get_contents(public_path('img/faker_img/brands/blue_heaven.jpg')), 'public');
        Storage::disk('public')->put("brooke_bond.jpg", file_get_contents(public_path('img/faker_img/brands/brooke_bond.jpg')), 'public');
        Storage::disk('public')->put("charak.jpg", file_get_contents(public_path('img/faker_img/brands/charak.jpg')), 'public');
        Storage::disk('public')->put("cipla.jpg", file_get_contents(public_path('img/faker_img/brands/cipla.jpg')), 'public');
        Storage::disk('public')->put("dabur.jpeg", file_get_contents(public_path('img/faker_img/brands/dabur.jpeg')), 'public');
        Storage::disk('public')->put("days.jpg", file_get_contents(public_path('img/faker_img/brands/days.jpg')), 'public');
        Storage::disk('public')->put("divya.jpg", file_get_contents(public_path('img/faker_img/brands/divya.jpg')), 'public');
        Storage::disk('public')->put("dr_ortho.jpg", file_get_contents(public_path('img/faker_img/brands/dr_ortho.jpg')), 'public');
        Storage::disk('public')->put("emami.jpg", file_get_contents(public_path('img/faker_img/brands/emami.jpg')), 'public');
        Storage::disk('public')->put("everest.jpg", file_get_contents(public_path('img/faker_img/brands/everest.jpg')), 'public');
        Storage::disk('public')->put("gomata.jpg", file_get_contents(public_path('img/faker_img/brands/gomata.jpg')), 'public');
        Storage::disk('public')->put("hamdard.jpg", file_get_contents(public_path('img/faker_img/brands/hamdard.jpg')), 'public');
        Storage::disk('public')->put("hem.jpg", file_get_contents(public_path('img/faker_img/brands/hem.jpg')), 'public');
        Storage::disk('public')->put("hemani.jpg", file_get_contents(public_path('img/faker_img/brands/hemani.jpg')), 'public');
        Storage::disk('public')->put("himalaya.jpg", file_get_contents(public_path('img/faker_img/brands/himalaya.jpg')), 'public');
        Storage::disk('public')->put("indian_khadi.jpg", file_get_contents(public_path('img/faker_img/brands/indian_khadi.jpg')), 'public');
        Storage::disk('public')->put("indulekha.jpg", file_get_contents(public_path('img/faker_img/brands/indulekha.jpg')), 'public');
        Storage::disk('public')->put("jagat_pharma.jpg", file_get_contents(public_path('img/faker_img/brands/jagat_pharma.jpg')), 'public');
        Storage::disk('public')->put("kailash-jeevan.jpg", file_get_contents(public_path('img/faker_img/brands/kailash-jeevan.jpg')), 'public');
        Storage::disk('public')->put("vicco.jpg", file_get_contents(public_path('img/faker_img/brands/vicco.jpg')), 'public');
        Storage::disk('public')->put("maharishi.jpg", file_get_contents(public_path('img/faker_img/brands/maharishi.jpg')), 'public');
        Storage::disk('public')->put("nagarjuna.jpg", file_get_contents(public_path('img/faker_img/brands/nagarjuna.jpg')), 'public');
        Storage::disk('public')->put("kottakkal.jpg", file_get_contents(public_path('img/faker_img/brands/kottakkal.jpg')), 'public');
        Storage::disk('public')->put("jyothy.jpg", file_get_contents(public_path('img/faker_img/brands/jyothy.jpg')), 'public');
        Storage::disk('public')->put("nirdosh.jpg", file_get_contents(public_path('img/faker_img/brands/nirdosh.jpg')), 'public');
        Storage::disk('public')->put("satya.jpg", file_get_contents(public_path('img/faker_img/brands/satya.jpg')), 'public');
        Storage::disk('public')->put("zandu.jpg", file_get_contents(public_path('img/faker_img/brands/zandu.jpg')), 'public');
        Storage::disk('public')->put("organic-india.jpg", file_get_contents(public_path('img/faker_img/brands/organic-india.jpg')), 'public');
        Storage::disk('public')->put("supradyn.jpg", file_get_contents(public_path('img/faker_img/brands/supradyn.jpg')), 'public');
        Storage::disk('public')->put("patanjali.jpg", file_get_contents(public_path('img/faker_img/brands/patanjali.jpg')), 'public');
        Storage::disk('public')->put("sri-sri.jpg", file_get_contents(public_path('img/faker_img/brands/sri-sri.jpg')), 'public');
        Storage::disk('public')->put("vasu.jpg", file_get_contents(public_path('img/faker_img/brands/vasu.jpg')), 'public');
        Storage::disk('public')->put("sun-pharma.jpg", file_get_contents(public_path('img/faker_img/brands/sun-pharma.jpg')), 'public');
        Storage::disk('public')->put("yogy.jpg", file_get_contents(public_path('img/faker_img/brands/yogy.jpg')), 'public');

        $files = base_path() . '/public/tovars/new_products_load_img_utf_8.csv';
        $row = 0;

        $brands = [];

        if (($handle = fopen($files, "r")) !== FALSE) {
            echo  $files."\n\r";
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ($row == 0) {$row++; continue;}

                    if (empty($data) || empty($data[0])) continue;

                    $context  = stream_context_create([
                        "ssl" => [
                            "verify_peer"      => false,
                            "verify_peer_name" => false,
                        ],
                    ]);

                    $fcontent = null;

                    if (!empty($data[4]))
                        $fcontent = @file_get_contents(public_path('img/faker_img/products/'.$data[4]));

                    if (empty($fcontent)&&(!empty($data[5])))
                        $fcontent = @file_get_contents(public_path('img/faker_img/products/'.$data[5]));

                    if (empty($fcontent)&&(!empty($data[6])))
                        $fcontent = @file_get_contents(public_path('img/faker_img/products/'.$data[6]));

                    if (!empty($fcontent)) {
                        $img_name = basename($data[4]);
                        Storage::disk('public')->put($img_name, $fcontent, 'public');
                        $ins_url = Storage::url($img_name);
                    } else {
                        $ins_url = "";
                    }

                    // $one_row = [
                    //     'sku' => 'tov_'.$row,
                    //     'title' => mb_convert_encoding($data[0], "utf-8", "windows-1251"),
                    //     'slug' => '',
                    //     'description' => text_formater(mb_convert_encoding($data[1], "utf-8", "windows-1251")),
                    //     'price' => str_replace(",",".",doubleval ($data[2])),
                    //     'old_price' => str_replace(",",".",doubleval ($data[3])),
                    //     'img' => $ins_url,
                    //     'hit' => rand(0,1)?true:false,
                    //     'new' => rand(0,1)?true:false,
                    //     'category' => mb_convert_encoding($data[7], "utf-8", "windows-1251"),
                    //     'sub_category' => mb_convert_encoding($data[8], "utf-8", "windows-1251"),
                    //     'brand' => mb_convert_encoding($data[9], "utf-8", "windows-1251"),
                    // ];

                    $one_row = [
                        'sku' => 'tov_'.$row,
                        'title' => $this->title_replace($data[0]),
                        'slug' => '',
                        'description' => text_formater($data[1]),
                        'price' => str_replace(",",".",doubleval ($data[2])),
                        'old_price' => str_replace(",",".",doubleval ($data[3])),
                        'img' => $ins_url,
                        'hit' => rand(0,1)?true:false,
                        'new' => rand(0,1)?true:false,
                        'recommend' => rand(0,1)?true:false,
                        'category' => $this->title_replace($data[7]),
                        'sub_category' => $data[8],
                        'brand' => $data[9],
                        'seo_title' => $this->title_replace($data[0])." купить",
                        'seo_description' => $this->title_replace($data[0])." купить с доставкой по России. Выгодные цены."
                    ];


                    $product_id = Product::create($one_row);
                    echo $product_id->id ." -> ". $one_row['title']."\n\r";


                    $category = DB::table('categories')->select('id')->where("title", $data[7])->first();
                    $sub_category = DB::table('categories')->select('id')->where("title", $data[8])->first();

                    if (!empty($category->id))
                    DB::table("category_product")->insert(
                        [
                            "category_id" => $category->id,
                            "product_id" => $product_id->id,
                        ]

                    );

                    if (!empty($sub_category->id))
                    DB::table("category_product")->insert(

                        [
                            "category_id" => $sub_category->id,
                            "product_id" => $product_id->id,
                        ]
                    );

                    $brands[$one_row['brand']] = [
                        'title' => $one_row['brand'],
                        'slug' => "",
                        'description' => "Описание категории: ".$one_row['brand'],
                        'img' => $this->grt_brand_img_name($one_row['brand'])
                    ];


                    if (!empty($data[5])) {
                        $fcontent = @file_get_contents(public_path('img/faker_img/products/'.$data[5]));

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
                        $fcontent = @file_get_contents(public_path('img/faker_img/products/'.$data[6]));

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


        foreach($brands as $element)
        {
            $brand_id = Brand::create($element);
            echo $brand_id->id."\n\r";
        }

        // unlink($dir."/".$files);
        }
    }
}
