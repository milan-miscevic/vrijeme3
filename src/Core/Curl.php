<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Core;

class Curl
{
    public function get(string $url): string
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /** @var string|false $response */
        $response = curl_exec($ch);

        if ($response === false) {
            throw new \RuntimeException(curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }
}
