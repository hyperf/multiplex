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

use Throwable;

class ExceptionThrower
{
    public function __construct(protected Throwable $throwable)
    {
    }

    public function getThrowable(): Throwable
    {
        return $this->throwable;
    }
}
