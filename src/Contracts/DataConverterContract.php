<?php

namespace Oakoae\Contracts;

interface DataConverterContract
{
    /**
     * Parse method
     * @param initial array of data
     * @return parsed array
     */
    public function convert($data);
}
