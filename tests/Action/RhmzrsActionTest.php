<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Tests\Action;

use Mmm\Vrijeme3\Action\RhmzrsAction;
use Mmm\Vrijeme3\Core\Curl;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class RhmzrsActionTest extends TestCase
{
    /** @var Curl&MockObject */
    protected mixed $curl;

    protected RhmzrsAction $action;

    protected function setUp(): void
    {
        $this->curl = $this->getMockBuilder(Curl::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->action = new RhmzrsAction($this->curl, '14542');
    }

    public function testSuccessful(): void
    {
        $this->curl->expects($this->once())
            ->method('get')
            ->with($this->equalTo('https://rhmzrs.com/wp-content/feeds/temperatureTrenutne.json'))
            ->willReturn('{"TemperatureTrenutne":[{"StationID":"14542","TrenutnaTemp":"12.3"}]}');

        $this->assertSame('12.3', $this->action->run()->getContent());
    }
}
