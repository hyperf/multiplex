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

use Multiplex\Packer;
use Multiplex\Packet;

/**
 * @internal
 * @coversNothing
 */
class PackerTest extends AbstractTestCase
{
    public function testPack()
    {
        $packer = new Packer();
        $data = $packer->pack(new Packet($id = rand(0, 99999), $body = uniqid()));
        $this->assertSame(21, strlen($data));

        $packet = $packer->unpack($data);
        $this->assertSame($id, $packet->getId());
        $this->assertSame($body, $packet->getBody());
    }
}
