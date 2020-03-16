<?php

namespace Vrijeme3;

class Stdlib
{
    public static function fahrenheitToCelsius(float $temperature): float
    {
        return round(($temperature - 32) * 5 / 9, 1);
    }
}