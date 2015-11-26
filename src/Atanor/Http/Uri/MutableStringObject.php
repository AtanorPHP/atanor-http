<?php
declare(strict_types = 1);
namespace Atanor\Http\Uri;

interface MutableStringObject
{
    /**
     * Set URI from uri string
     * @param string $string
     * @return MutableStringObject
     */
    public function fromString(string $string):MutableStringObject;
}