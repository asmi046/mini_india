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

        $ch = curl_init(config('yandex.yandex_delivery_lnk').$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_line );

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode ($result);

    }

    public function calc_price($city, $street, $home, $postindex, $price) {
        $fullAdress = $postindex.", г. ".$city.", ".$street.", ".$home;

        $payload = [
            "destination"=> [
                "address" => $fullAdress
            ],
            "payment_method" => "already_paid",
            "source"=> [
                "address" => "117303, Москва, Малая Юшуньская улица, 1к1"
            ],

            "tariff" => "time_interval",
            "total_assessed_price" => $price * 100,
            "total_weight" => 2
        ];

        $result = $this->do_query('pricing-calculator?is_oversized=false', 'POST', $payload, true);
        return $result;
    }
}
