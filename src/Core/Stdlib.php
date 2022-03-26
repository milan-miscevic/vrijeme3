<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Core;

class Stdlib
{
    public static function fahrenheitToCelsius(float $temperature): float
    {
        return round(($temperature - 32) * 5 / 9, 1);
    }
}
