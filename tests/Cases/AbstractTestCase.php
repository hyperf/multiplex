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

namespace HyperfTest\Cases;

use Mockery;
use PHPUnit\Framework\TestCase;

use function Hyperf\Coroutine\run;

abstract class AbstractTestCase extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function runInCoroutine(callable $callable)
    {
        if (extension_loaded('swow')) {
            return $callable();
        }
        return run($callable);
    }
}
