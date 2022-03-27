<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Tests\Core;

use Mmm\Vrijeme3\Core\Curl;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use stdClass;

class CurlTest extends TestCase
{
    use PHPMock;

    private stdClass $curlHandle;

    protected function setUp(): void
    {
        // As CurlHandle is a final class and it can not be doubled.
        // It is replaced with stdClass.

        $this->curlHandle = new stdClass();

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_init')
            ->expects($this->once())
            ->willReturn($this->curlHandle);

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_setopt')
            ->expects($this->exactly(5))
            ->withConsecutive(
                [$this->curlHandle, CURLOPT_URL, 'http://www.example.com/'],
                [$this->curlHandle, CURLOPT_CUSTOMREQUEST, 'GET'],
                [$this->curlHandle, CURLOPT_RETURNTRANSFER, true],
                [$this->curlHandle, CURLOPT_SSL_VERIFYHOST, 0],
                [$this->curlHandle, CURLOPT_SSL_VERIFYPEER, 0],
            )
            ->willReturn(true);
    }

    public function testSuccessful(): void
    {
        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_exec')
            ->expects($this->once())
            ->with($this->curlHandle)
            ->willReturn('Successful data');

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_error')
            ->expects($this->never());

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_close')
            ->expects($this->once())
            ->with($this->curlHandle);

        $curl = new Curl();
        $data = $curl->get('http://www.example.com/');

        $this->assertSame('Successful data', $data);
    }

    public function testRuntimeException(): void
    {
        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_exec')
            ->expects($this->once())
            ->with($this->curlHandle)
            ->willReturn(false);

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_error')
            ->expects($this->once())
            ->with($this->curlHandle)
            ->willReturn('Error message');

        $this->getFunctionMock('Mmm\Vrijeme3\Core', 'curl_close')
            ->expects($this->never());

        $this->expectException(RuntimeException::class);

        $curl = new Curl();
        $curl->get('http://www.example.com/');
    }
}
