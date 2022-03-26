<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Tests;

use Mmm\Vrijeme3\Action\PurpleairAction;
use Mmm\Vrijeme3\Core\Curl;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PurpleairActionTest extends TestCase
{
    protected PurpleairAction $action;

    /** @var Curl&MockObject */
    protected mixed $curl;

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
            ->willReturn('{"results":[{"temp_f":50}]}');

        $this->assertSame('10', $this->action->run()->getContent());
    }
}
