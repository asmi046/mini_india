<?php

if (!function_exists("clear_html")) {
    function clear_html($value) {
        // return preg_replace('~>\K\s+~', PHP_EOL, $value);
        return str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $value);
    }
}

if (!function_exists("shpw_option")) {
    function shpw_option($value, $options) {
        return (array_key_exists($value, $options))?$options[$value]:"";
    }
}

if (!function_exists("get_all_cat")) {
    function get_all_cat($filename) {
        $row = 0;

        $categories = [];
        $sub_categories = [];

        if (($handle = fopen($filename, "r")) !== FALSE) {
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ($row == 0) {$row++; continue;}
                if (empty($data) || empty($data[0])) continue;
                    // $cat = mb_convert_encoding($data[7], "utf-8", "windows-1251");
                    // $sub_cat = mb_convert_encoding($data[8], "utf-8", "windows-1251");

                    $cat = $data[7];
                    $sub_cat = $data[8];

                    if (empty($cat) || empty($sub_cat)) {$row++; continue;}

                    $categories[$cat][$sub_cat] = $sub_cat;
            }
        }

        // return array_merge($categories, $sub_categories);
        return $categories;
    }
}

if (!function_exists("value_check")) {
    function value_check($nameparam = null, $find = null, $default = null) {
        $value = Request::input($nameparam);
        if ($value == null)
            return $default;

        if (is_array($value)) {
            return in_array($find, $value);
        } else {
            return $value;
        }
    }
}

if (!function_exists("text_formater")) {
    function text_formater($text) {
        $text_result = $text;
        $text_result = str_replace("ПРИМЕНЕНИЕ:","ПРИМЕНЕНИЕ", $text_result);
        $text_result = str_replace("ПРИМЕНЕНИЕ","<h3>Применение</h3>", $text_result);

        $text_result = str_replace("НАЗНАЧЕНИЕ:","НАЗНАЧЕНИЕ", $text_result);
        $text_result = str_replace("НАЗНАЧЕНИЕ","<h3>Назначение</h3>", $text_result);

        $text_result = str_replace("\n\r","<br><br>", $text_result);
        $text_result = str_replace("\n","<br>", $text_result);
        $text_result = str_replace("\r","<br>", $text_result);

        $text_result = str_replace("</h3><br><br>","</h3>", $text_result);

        return $text_result;
    }
}
