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

use Multiplex\Contract\HasHeartbeatInterface;

class Packet implements HasHeartbeatInterface
{
    public function __construct(protected int $id, protected string $body)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function isHeartbeat(): bool
    {
        return $this->id === 0 && in_array($this->body, [static::PING, static::PONG], true);
    }
}
