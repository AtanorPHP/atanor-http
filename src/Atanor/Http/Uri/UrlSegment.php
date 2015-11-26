<?php
declare(strict_types = 1);
namespace Atanor\Http\Uri;

class UrlSegment implements StringObject,MutableStringObject
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $parameterList = [];

    /**
     * @inheritDoc
     */
    public function fromString(string $string):MutableStringObject
    {
        $this->parameterList = new DefaultParameterList();
        $pattern = '@^(?<name>[^';
        $pattern .= $this->parameterList->getParamSeparatorList();
        $pattern .= ']+)(?<parameters>.*)@';
        preg_match($pattern,$string,$matches);
        if (isset($matches['name'])) $this->name =  $matches['name'];
        $parameterString = $matches['parameters'];
        $this->parameterList->fromString($parameterString);
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getParameterList()
    {
        return $this->parameterList;
    }




}