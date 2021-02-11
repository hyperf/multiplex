<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace HyperfTest\Cases;

use Hyperf\Engine\Channel;
use Multiplex\ChannelManager;

/**
 * @internal
 * @coversNothing
 */
class ChannelManagerTest extends AbstractTestCase
{
    public function testChannelManager()
    {
        $this->runInCoroutine(function () {
            $mapper = new ChannelManager();
            $chan = $mapper->get(1, true);
            $this->assertInstanceOf(Channel::class, $chan);
            $chan = $mapper->get(1);
            $this->assertInstanceOf(Channel::class, $chan);
            go(function () use ($chan) {
                usleep(10 * 1000);
                $chan->push('Hello World.');
            });

            $this->assertSame('Hello World.', $chan->pop());
            $mapper->close(1);
            $this->assertTrue($chan->isClosing());
            $this->assertNull($mapper->get(1));
        });
    }
}
