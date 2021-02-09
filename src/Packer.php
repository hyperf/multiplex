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
namespace Multiplex;

class Packer
{
    public function pack(Packet $packet): string
    {
        return sprintf(
            '%s%s%s',
            pack('N', strlen($packet->getBody()) + 4),
            pack('N', $packet->getId()),
            $packet->getBody()
        );
    }

    public function unpack(string $data): Packet
    {
        $unpacked = unpack('Nid', substr($data, 4, 4));
        $body = substr($data, 8);
        return new Packet((int) $unpacked['id'], $body);
    }
}
