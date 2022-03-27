<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Tests\Action;

use Mmm\Vrijeme3\Action\RhmzrsAction;
use Mmm\Vrijeme3\Core\Curl;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class RhmzrsActionTest extends TestCase
{
    private const SOURCE = 'https://rhmzrs.com/wp-content/feeds/temperatureTrenutne.json';
    private const DATA = '{"TemperatureTrenutne":[{"StationID":"14542","TrenutnaTemp":"12.3"}]}';

    /** @var Curl&MockObject */
    protected mixed $curl;

    protected function setUp(): void
    {
        $this->curl = $this->getMockBuilder(Curl::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testSuccessful(): void
    {
        $this->curl->expects($this->once())
            ->method('get')
            ->with($this->equalTo(self::SOURCE))
            ->willReturn(self::DATA);

        $action = new RhmzrsAction($this->curl, '14542');

        $this->assertSame('12.3', $action->run()->getContent());
    }

    public function testWrongCityId(): void
    {
        $this->curl->expects($this->once())
            ->method('get')
            ->with($this->equalTo(self::SOURCE))
            ->willReturn(self::DATA);

        $action = new RhmzrsAction($this->curl, '0');

        $this->assertSame('Unknown', $action->run()->getContent());
    }
}
