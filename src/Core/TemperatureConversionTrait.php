<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Core;

trait TemperatureConversionTrait
{
    private function fahrenheitToCelsius(float $temperature): float
    {
        return ($temperature - 32) * 5 / 9;
    }
}
