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
namespace Multiplex\Constract;

interface SerializerInterface
{
    /**
     * @param mixed $data
     */
    public function serialize($data): string;

    /**
     * @return mixed
     */
    public function unserialize(string $serialized);
}
