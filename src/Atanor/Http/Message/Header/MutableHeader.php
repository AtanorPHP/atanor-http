<?php
declare(strict_types = 1);
namespace Atanor\Http\Message\Header;

interface MutableHeader
{
    /**
     * Add value to the header
     * @param string $value
     * @return MutableHeader
     */
    public function addValue(string $value):MutableHeader;
}
