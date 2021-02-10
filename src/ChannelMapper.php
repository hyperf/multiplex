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

use Hyperf\Engine\Channel;

class ChannelMapper
{
    /**
     * @var int
     */
    protected $limit;

    /**
     * @var float|int
     */
    protected $timeout;

    /**
     * @var Channel[]
     */
    protected $channels;

    /**
     * @var Channel
     */
    protected $waiter;

    public function __construct(int $limit = 63355, float $timeout = 0)
    {
        $this->limit = $limit;
        $this->timeout = $timeout;
        $this->waiter = new Channel($limit);
    }

    public function get(int $id, bool $initialize = false): ?Channel
    {
        if (isset($this->channels[$id])) {
            return $this->channels[$id];
        }

        if ($initialize) {
            return $this->channels[$id] = new Channel(1);
        }

        return null;
    }

    public function close(int $id): void
    {
        if ($channel = $this->channels[$id] ?? null) {
            $channel->close();
        }

        unset($this->channels[$id]);
    }

    public function getWaiter(): Channel
    {
        return $this->waiter;
    }
}
