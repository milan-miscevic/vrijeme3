<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Tests\Action;

use Mmm\Vrijeme3\Action\PurpleairAction;
use Mmm\Vrijeme3\Core\Curl;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PurpleairActionTest extends TestCase
{
    public function testSuccessful(): void
    {
        /** @var Curl&MockObject */
        $curl = $this->getMockBuilder(Curl::class)
            ->disableOriginalConstructor()
            ->getMock();

        $curl->expects($this->once())
            ->method('get')
            ->with($this->equalTo('http://www.purpleair.com/json?show=33099'))
            ->willReturn('{"results":[{"temp_f":54.15}]}');

        $action = new PurpleairAction($curl);

        $this->assertSame('12.3', $action->run()->getContent());
    }
}
