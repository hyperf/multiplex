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
namespace Multiplex\Serializer;

use Multiplex\Contract\SerializerInterface;
use Multiplex\Exception\ServerHandleFailedException;

class JsonSerializer implements SerializerInterface
{
    public function serialize(mixed $data): string
    {
        if ($data instanceof \Throwable) {
            $result = [
                'code' => $data->getCode(),
                'message' => $data->getMessage(),
            ];
        } else {
            $result = [
                'code' => 0,
                'data' => $data,
            ];
        }

        return json_encode($result, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    }

    public function unserialize(string $serialized): mixed
    {
        $data = json_decode($serialized, flags: JSON_THROW_ON_ERROR);
        if (array_key_exists('data', $data)) {
            return $data['data'];
        }

        return new ServerHandleFailedException($data['code'] ?? 0, $data['message'] ?? 'The payload is invalid.');
    }
}
