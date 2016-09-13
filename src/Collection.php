<?php

namespace Oakoae;

use Oakoae\Contracts\DataConverterContract;

class Collection
{
    protected $converter = null;

    protected function __construct(DataConverterContract $converter)
    {
        $this->converter = $converter;
    }

    public static function parse($data, DataConverterContract $converter) {
        $col = new self($converter);

        return $col->converter->convert($data);
    }
}
