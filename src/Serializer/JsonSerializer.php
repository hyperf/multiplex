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

use Hyperf\Utils\Codec\Json;
use Multiplex\Constract\SerializerInterface;
use Multiplex\Exception\ServerHandleFailedException;

class JsonSerializer implements SerializerInterface
{
    public function serialize($data): string
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

        return Json::encode($result);
    }

    public function unserialize(string $serialized)
    {
        $data = Json::decode($serialized);
        if (array_key_exists('data', $data)) {
            return $data['data'];
        }

        return new ServerHandleFailedException($data['code'] ?? 0, $data['message'] ?? 'The payload is invalid.');
    }
}
