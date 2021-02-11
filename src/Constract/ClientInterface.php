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

use Multiplex\ChannelManager;

interface ClientInterface
{
    /**
     * @return $this
     */
    public function set(array $settings);

    /**
     * @param mixed $data
     * @return mixed
     */
    public function request($data);

    public function send($data): int;

    public function recv(int $id);

    public function getChannelManager(): ChannelManager;

    public function close(): void;
}
