<?php

class Alamat extends Controller
{
    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.rajaongkir.com/starter/province',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => array(),
        CURLOPT_HTTPHEADER => array(
            'key: 2839774580262fafd074f453bb91e4d4'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function kota()
    {
        $provinsi = $_GET['provinsi'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$provinsi",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
                "key: 2839774580262fafd074f453bb91e4d4"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

    public function totalOngkir()
    {
        $origin = $_GET['origin'];
        $destination = $_GET['destination'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => 'origin=' . $origin . '&destination=' . $destination . '&weight=1700&courier=jne',
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 2839774580262fafd074f453bb91e4d4"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        echo $response;
    }
}
