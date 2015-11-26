<?php
declare(strict_types = 1);
namespace Atanor\Http\Uri;

interface ParameterList extends StringObject
{
    /**
     * Retunrs a string containing all parameter separators
     * @return string
     */
    public function getParamSeparatorList():string;
}