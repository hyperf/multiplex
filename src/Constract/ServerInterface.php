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

use Hyperf\Utils\Collection;

interface ServerInterface
{
    /**
     * @return $this
     */
    public function bind(string $name, int $port, Collection $config);

    /**
     * @return $this
     */
    public function handle(callable $callable);

    public function start(): void;
}
