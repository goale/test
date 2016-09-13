<?php

namespace Oakoae;

use Oakoae\Contracts\DataConverterContract;

class ArrayToDotConverter implements DataConverterContract
{
    public function convert($data)
    {
        return $this->flatten($data);
    }

    protected function flatten($item, $keys = [])
    {
        $result = [];

        foreach ($item as $key => $value) {
            $keys[] = $key;
            if (is_array($value)) {
                return $this->flatten($value, $keys);
            } else {
                $dotKey = implode('.', $keys);
                $keys = [];
                $result[$dotKey] = $value;
            }
        }

        return $result;
    }
}
