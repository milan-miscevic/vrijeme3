<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Core;

use Mmm\Vrijeme3\Tests\Internal\Counter;

function curl_init($url = null)
{
    Counter::incrementCalls('curl_init');

    return false;
}

function curl_setopt($handle, $option, $value)
{
    Counter::incrementCalls('curl_setopt');

    return true;
}

function curl_exec($handle)
{
    Counter::incrementCalls('curl_exec');

    return 'Success';
}

function curl_error($handle)
{
    Counter::incrementCalls('curl_error');

    return 'Error';
}

function curl_close($handle)
{
    Counter::incrementCalls('curl_close');
}
