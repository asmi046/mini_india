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
            "client_price" =>300000,
            "destination"=> [
                "address" => "305046 г. Курск ул. Олимпийская д. 29"
            ],
            "payment_method" => "already_paid",
            "source"=> [
                "address" => "305046 г. Курск ул. Олимпийская д. 29"
            ],

            "tariff" => "time_interval",
            "total_assessed_price" => 300000,
            "total_weight" => 2
        ];

        $result = $this->do_query('pricing-calculator?is_oversized=false', 'POST', $payload, true);
        return $result;
    }
}
