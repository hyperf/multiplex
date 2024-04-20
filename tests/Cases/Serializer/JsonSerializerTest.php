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

namespace HyperfTest\Cases\Serializer;

use HyperfTest\Cases\AbstractTestCase;
use Multiplex\Serializer\JsonSerializer;

/**
 * @internal
 * @coversNothing
 */
class JsonSerializerTest extends AbstractTestCase
{
    public function testSerialize()
    {
        $asserts = [
            uniqid(),
            [uniqid()],
            rand(0, 9999),
        ];
        $serializer = new JsonSerializer();
        foreach ($asserts as $assert) {
            $serialized = $serializer->serialize($assert);
            $this->assertSame($assert, $serializer->unserialize($serialized));
        }
    }
}
