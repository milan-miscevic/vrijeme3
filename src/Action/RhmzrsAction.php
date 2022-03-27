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
    private const SOURCE = 'https://rhmzrs.com/wp-content/feeds/temperatureTrenutne.json';

    private Curl $curl;
    private string $cityId;

    public function __construct(Curl $curl, string $cityId)
    {
        $this->curl = $curl;
        $this->cityId = $cityId;
    }

    public function run(): Response
    {
        $rawWeatherData = $this->curl->get(self::SOURCE);

        /** @var array{TemperatureTrenutne: CityWeatherData[]} */
        $weatherData = json_decode($rawWeatherData, true);

        $temperature = 'Unknown';

        foreach ($weatherData['TemperatureTrenutne'] as $cityWeatherData) {
            if ($cityWeatherData['StationID'] === $this->cityId) {
                $temperature = $cityWeatherData['TrenutnaTemp'];
                break;
            }
        }

        return new Response($temperature);
    }
}
