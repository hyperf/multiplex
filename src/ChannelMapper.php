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

    public function __construct(int $limit = 63355, float $timeout = 0)
    {
        $this->limit = $limit;
        $this->timeout = $timeout;
    }

    public function get(int $id, bool $initialize = false): ?Channel
    {
    }
}
