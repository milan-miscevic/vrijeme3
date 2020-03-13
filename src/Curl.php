<?php

namespace Vrijeme3;

class Curl
{
    public function get(string $url): string
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === FALSE) {
            throw new \RuntimeException(curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }
}
