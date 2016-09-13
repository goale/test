<?php

namespace Oakoae;

use Oakoae\Contracts\DataConverterContract;

class ArrayToDotConverter implements DataConverterContract
{
    public function convert($data)
    {
        return $this->flatten($data);
    }

    protected function flatten($data, $keys = [])
    {
        $result = [];
        foreach ($data as $key => $value) {
            $newKeys = array_merge($keys, [$key]);
            if (is_array($value)) {
                $result = array_merge($result, $this->flatten($value, $newKeys));
            } else {
                $key = implode('.', $newKeys);
                $result[$key] = $value;
            }
        }

        return $result;
    }
}
