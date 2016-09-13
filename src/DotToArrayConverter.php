<?php

namespace Oakoae;

use Oakoae\Contracts\DataConverterContract;

class DotToArrayConverter implements DataConverterContract
{
    public function convert($data)
    {
        return array_reduce(array_keys($data), function ($carry, $key) use ($data) {
            return $this->createNestedItem($carry, explode('.', $key), $data[$key]);
        }, []);

    }

    protected function createNestedItem($data, $keys, $value)
    {
        $key = array_shift($keys);

        if (count($keys) == 0) {
            return [$key => $value];
        }

        if (!array_key_exists($key, $data)) {
            $data[$key] = [];
        }

        return array_merge(
            $data,
            [
                $key => array_merge($data[$key], $this->createNestedItem($data[$key], $keys, $value))
            ]
        );
    }
}
