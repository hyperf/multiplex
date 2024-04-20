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

use Multiplex\IdGenerator;

/**
 * @internal
 * @coversNothing
 */
class IdGeneratorTest extends AbstractTestCase
{
    public function testGenerate()
    {
        $generator = new IdGenerator();
        $this->assertSame(1, $generator->generate());
    }
}
