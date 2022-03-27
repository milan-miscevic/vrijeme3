<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Tests\Core;

use Mmm\Vrijeme3\Core\Curl;
use Mmm\Vrijeme3\Tests\Internal\Counter;
use PHPUnit\Framework\TestCase;

class CurlTest extends TestCase
{
    protected function setUp(): void
    {
        Counter::reset();

        /** @psalm-suppress MissingFile */
        require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'Internal' . DIRECTORY_SEPARATOR . 'curl_.php';
    }

    public function testSuccessful(): void
    {
        $curl = new Curl();
        $data = $curl->get('url');

        $this->assertSame('Success', $data);

        $this->assertSame(1, Counter::getCalls('curl_init'));
        $this->assertSame(5, Counter::getCalls('curl_setopt'));
        $this->assertSame(1, Counter::getCalls('curl_exec'));
        $this->assertSame(0, Counter::getCalls('curl_error'));
        $this->assertSame(1, Counter::getCalls('curl_close'));
    }
}
