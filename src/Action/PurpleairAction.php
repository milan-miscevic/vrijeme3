<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Action;

use Mmm\Inert\Action;
use Mmm\Inert\Response;
use Mmm\Vrijeme3\Core\Curl;
use Mmm\Vrijeme3\Core\Stdlib;

/**
 * @phpstan-type WeatherData array{results: array{0: array{temp_f: int}}}
 * @psalm-type WeatherData array{results: array{0: array{temp_f: int}}}
 * The rest of data/indexes are ignored.
 */
class PurpleairAction implements Action
{
    public function __construct(private Curl $curl)
    {
    }

    public function run(): Response
    {
        $data = $this->curl->get('http://www.purpleair.com/json?show=33099');
        /** @var WeatherData */
        $data = json_decode($data, true);

        $temperature = Stdlib::fahrenheitToCelsius((float) $data['results'][0]['temp_f']);

        return new Response((string) $temperature);
    }
}
