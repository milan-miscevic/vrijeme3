<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Tests\Core;

use Mmm\Vrijeme3\Core\Curl;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;

class CurlTest extends TestCase
{
    use PHPMock;

    public function testSuccessful(): void
    {
        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_init')
            ->expects($this->once())
            ->willReturn(true); // TODO

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_setopt')
            ->expects($this->exactly(5))
            ->withConsecutive(
                [true, CURLOPT_URL, 'http://www.example.com/'],
                [true, CURLOPT_CUSTOMREQUEST, 'GET'],
                [true, CURLOPT_RETURNTRANSFER, true],
                [true, CURLOPT_SSL_VERIFYHOST, 0],
                [true, CURLOPT_SSL_VERIFYPEER, 0],
            )
            ->willReturn(true);

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_exec')
            ->expects($this->once())
            ->with(true)
            ->willReturn('Successful data');

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_error')
            ->expects($this->never())
            ->with(true)
            ->willReturn('Error message');

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_close')
            ->expects($this->once())
            ->with(true);

        $curl = new Curl();
        $data = $curl->get('http://www.example.com/');

        $this->assertSame('Successful data', $data);
    }
}
