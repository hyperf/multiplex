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

use Multiplex\Exception\ServerBindFailedException;
use Multiplex\Exception\ServerStartFailedException;

interface ServerInterface
{
    /**
     * @param $config = [
     *     'package_max_length' => 1024 * 1024 * 2
     * ]
     * @throws ServerBindFailedException
     * @return $this
     */
    public function bind(string $name, int $port, array $config);

    /**
     * @return $this
     */
    public function handle(callable $callable);

    /**
     * @throws ServerStartFailedException
     */
    public function start(): void;
}
