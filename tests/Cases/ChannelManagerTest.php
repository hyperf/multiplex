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

use function Hyperf\Coroutine\go;

/**
 * @internal
 * @coversNothing
 */
class ChannelManagerTest extends AbstractTestCase
{
    public function testChannelManager()
    {
        $this->runInCoroutine(function () {
            $manager = new ChannelManager();
            $chan = $manager->get(1, true);
            $this->assertInstanceOf(Channel::class, $chan);
            $chan = $manager->get(1);
            $this->assertInstanceOf(Channel::class, $chan);
            go(function () use ($chan) {
                usleep(10 * 1000);
                $chan->push('Hello World.');
            });

            $this->assertSame('Hello World.', $chan->pop());
            $manager->close(1);
            $this->assertTrue($chan->isClosing());
            $this->assertNull($manager->get(1));
        });
    }

    public function testChannelFlush()
    {
        $this->runInCoroutine(function () {
            $manager = new ChannelManager();
            $manager->get(1, true);
            $manager->get(2, true);
            $manager->get(4, true);
            $manager->get(5, true);

            $this->assertSame(4, count($manager->getChannels()));
            $manager->flush();
            $this->assertSame(0, count($manager->getChannels()));
        });
    }
}
