<?php

declare(strict_types=1);

namespace Vrijeme3;

use Inert\Action;

class PurpleairAction extends Action
{
    private Curl $curl;

    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function run(): void
    {
        $data = $this->curl->get('http://www.purpleair.com/json?show=33099');
        $data = json_decode($data, true);

        echo Stdlib::fahrenheitToCelsius($data['results'][0]['temp_f']);
    }
}
