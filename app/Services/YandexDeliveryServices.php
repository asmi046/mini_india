<?php
namespace App\Services;

class YandexDeliveryServices {

    protected function do_query($url, $method, $payload = [], $autorized = false) {

        $payload_json = json_encode ($payload, JSON_UNESCAPED_UNICODE);

        $header_line = [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload_json)
        ];

        if ($autorized) $header_line[] = "Authorization: Bearer ".config('yandex.yandex_delivery_token');

        $ch = curl_init("https://b2b.taxi.tst.yandex.net/api/b2b/platform/".$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_line );

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode ($result);

    }

    public function calc_price() {
        $payload = [
            "client_price" =>100000,
            "destination"=> [
                "address" => "153000, г. Иваново, ул. Жарова, 11"
            ],
            "payment_method" => "already_paid",
            "source"=> [
                // "platform_station_id" => "4eb18cc4-329d-424d-a8a8-abfd8926463d"
                // "address" => "105064, г. Москва, ул. Земляной вал, д. 14-16, стр. 1"
                "address" => "305046, г. Курск, ул. Олимпийская, д. 29"
            ],

            "tariff" => "time_interval",
            "total_assessed_price" => 700000,
            "total_weight" => 1
        ];

        $result = $this->do_query('pricing-calculator?is_oversized=false', 'POST', $payload, true);
        return $result;
    }
}
