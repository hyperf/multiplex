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
    public function send($data): int;

    public function recv(int $id);

    public function getChannelManager(): ChannelManager;
}
