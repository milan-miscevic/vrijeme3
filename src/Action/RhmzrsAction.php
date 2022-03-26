<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Action;

use Mmm\Inert\Action;
use Mmm\Inert\Response;
use Mmm\Vrijeme3\Core\Curl;

/**
 * @phpstan-type CityWeatherData array{StationID: string, TrenutnaTemp: string}
 * @psalm-type CityWeatherData = array{StationID: string, TrenutnaTemp: string}
 * The rest of data/indexes are ignored.
 */
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
        /** @var array{TemperatureTrenutne: CityWeatherData[]} */
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
