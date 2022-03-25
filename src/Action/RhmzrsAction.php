<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Mmm\Inert\Action;
use Mmm\Inert\Response;
use Vrijeme3\Core\Curl;

class RhmzrsAction implements Action
{
    private Curl $curl;

    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function run(): Response
    {
        $data = $this->curl->get('https://rhmzrs.com/wp-content/feeds/temperatureTrenutne.json');
        $temperatures = json_decode($data, true);

        $banjalukaTemperature = 'Unknown';

        foreach ($temperatures['TemperatureTrenutne'] as $city) {
            if ($city['StationID'] === '14542') {
                $banjalukaTemperature = $city['TrenutnaTemp'];
                break;
            }
        }

        return new Response($banjalukaTemperature);
    }
}
