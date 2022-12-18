<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $files = base_path() . '/public/tovars/tovars_v1.csv';
        $row = 0;

        $categories = [];

        if (($handle = fopen($files, "r")) !== FALSE) {
            echo  $files."\n\r";
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ($row == 0) {$row++; continue;}

                    if (empty($data) || empty($data[0])) continue;

                    $one_row = [
                        'sku' => 'tov_'.$row,
                        'name' => mb_convert_encoding($data[0], "utf-8", "windows-1251"),
                        'descr' => mb_convert_encoding($data[1], "utf-8", "windows-1251"),
                        'price' => str_replace(",",".",$data[2]),
                        'price_old' => str_replace(",",".",$data[3]),
                        'photo1' => $data[4],
                        'photo2' => $data[5],
                        'photo3' => $data[6],
                        'cat' => mb_convert_encoding($data[7], "utf-8", "windows-1251")
                    ];

                    $categories[$one_row['cat']] = $one_row['cat'];

                    // var_dump($one_row);

                    if (empty($data[0])) continue;

                    // $rez = DB::table('products')->where('sku', $sku)->update(['price' => $price, "insklad" => $count, "price_old" => 0]);
                $row++;
            }

        fclose($handle);
        var_dump($categories);
        // unlink($dir."/".$files);
        }
    }
}
