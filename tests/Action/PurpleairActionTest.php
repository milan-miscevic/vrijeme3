<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Tests\Action;

use Mmm\Vrijeme3\Action\PurpleairAction;
use Mmm\Vrijeme3\Core\Curl;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PurpleairActionTest extends TestCase
{
    /** @var Curl&MockObject */
    protected mixed $curl;

    protected PurpleairAction $action;

    protected function setUp(): void
    {
        $this->curl = $this->getMockBuilder(Curl::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->action = new PurpleairAction($this->curl);
    }

    public function testSuccessful(): void
    {
        $this->curl->expects($this->once())
            ->method('get')
            ->with($this->equalTo('http://www.purpleair.com/json?show=33099'))
            ->willReturn('{"results":[{"temp_f":54.15}]}');

        $this->assertSame('12.3', $this->action->run()->getContent());
    }
}
