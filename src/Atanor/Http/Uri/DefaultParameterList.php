<?php
declare(strict_types = 1);
namespace Atanor\Http\Uri;

class DefaultParameterList implements ParameterList, MutableStringObject
{
    /**
     * Key value pair list
     * @var array
     */
    protected $parameters = [];

    /**
     * DefaultParameterList constructor.
     * @param string $paramString
     * @param array  $separators
     */
    public function fromString(string $paramString):MutableStringObject
    {
        $parameterStrings = preg_split('@[' . $this->getParamSeparatorList() . ']@',$paramString);
        foreach($parameterStrings as $p) {
            if (empty($p)) continue;
            $param = preg_split('@=@',$p);
            if (count($param) == 0) continue;
            $this->parameters[$param[0]] = $param[1];
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function __toString():string
    {
        // TODO: Implement __toString() method.
    }

    /**
     * @inheritDoc
     */
    public function getParamSeparatorList():string
    {
        return '&;';
    }


}