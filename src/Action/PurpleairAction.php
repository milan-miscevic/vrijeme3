<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Inert\BaseAction;
use Inert\Response;
use Vrijeme3\Core\Curl;
use Vrijeme3\Core\Stdlib;

class PurpleairAction extends BaseAction
{
    private Curl $curl;

    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function run(): Response
    {
        $data = $this->curl->get('http://www.purpleair.com/json?show=33099');
        $data = json_decode($data, true);

        $temperature = Stdlib::fahrenheitToCelsius((float) $data['results'][0]['temp_f']);

        return new Response((string) $temperature);
    }
}
