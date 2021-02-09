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

class IdGenerator
{
    /**
     * @var int
     */
    protected $id = 0;

    public function generate(): int
    {
        return ++$this->id;
    }
}
