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

namespace Multiplex\Contract;

use Multiplex\ChannelManager;

interface ClientInterface
{
    public function set(array $settings): static;

    public function request(mixed $data): mixed;

    public function send(mixed $data): int;

    public function recv(int $id): mixed;

    public function getChannelManager(): ChannelManager;

    public function close(): void;
}
