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

namespace Multiplex\Serializer;

use Multiplex\Contract\SerializerInterface;

class StringSerializer implements SerializerInterface
{
    public function serialize(mixed $data): string
    {
        return (string) $data;
    }

    public function unserialize(string $serialized): mixed
    {
        return $serialized;
    }
}
