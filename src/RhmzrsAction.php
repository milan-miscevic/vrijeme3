<?php

declare(strict_types=1);

namespace Vrijeme3;

use Inert\Action;

class RhmzrsAction extends Action
{
    private Curl $curl;

    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function run(): void
    {
        $data = $this->curl->get('http://rhmzrs.com/wp-content/feeds/temperatureTrenutne.json');
        $temperatures = json_decode($data, true);

        $banjalukaTemperature = 'Unknown';

        foreach ($temperatures['TemperatureTrenutne'] as $city) {
            if ($city['StationID'] === '14542') {
                $banjalukaTemperature = $city['TrenutnaTemp'];
                break;
            }
        }

        echo $banjalukaTemperature;
    }
}
