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

use Multiplex\Packet;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class PacketTest extends TestCase
{
    public function testPacketConstructor()
    {
        $packet = new Packet(1, $body = uniqid());

        $this->assertSame(1, $packet->getId());
        $this->assertSame($body, $packet->getBody());
    }
}
