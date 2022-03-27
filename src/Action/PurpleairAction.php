<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Action;

use Mmm\Inert\Action;
use Mmm\Inert\Response;
use Mmm\Vrijeme3\Core\Curl;
use Mmm\Vrijeme3\Core\TemperatureConversionTrait;

/**
 * @phpstan-type WeatherData array{results: array{0: array{temp_f: int}}}
 * @psalm-type WeatherData array{results: array{0: array{temp_f: int}}}
 * The rest of data/indexes are ignored.
 */
class PurpleairAction implements Action
{
    use TemperatureConversionTrait;

    private const SOURCE = 'http://www.purpleair.com/json?show=33099';

    public function __construct(private Curl $curl)
    {
    }

    public function run(): Response
    {
        $rawWeatherData = $this->curl->get(self::SOURCE);

        /** @var WeatherData */
        $weatherData = json_decode($rawWeatherData, true);

        $temperature = $this->fahrenheitToCelsius($weatherData['results'][0]['temp_f']);
        $temperature = round($temperature, 1);

        return new Response((string) $temperature);
    }
}
