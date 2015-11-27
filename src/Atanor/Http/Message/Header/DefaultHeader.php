<?php
declare(strict_types = 1);
namespace Atanor\Http\Message\Header;

use Atanor\Http\Uri\MutableStringObject;

class DefaultHeader implements Header, MutableHeader, MutableStringObject
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $values = [];

    /**
     * @inheritDoc
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getValues():array
    {
        return $this->values;
    }

    /**
     * @inheritDoc
     */
    public function __construct(string $name, array $values)
    {
        $this->name = $name;
        $this->values = $values;
    }

    /**
     * @inheritDoc
     */
    public function __toString():string
    {
        $str = $this->name;
        $str .= ': ';
        foreach($this->values as $value) {
            $str .= $value . ',';
        }
        $str = rtrim($str,',');
        return $str;
    }

    /**
     * @inheritDoc
     */
    public function addValue(string $value):MutableHeader
    {
        $this->values[] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function fromString(string $string):MutableStringObject
    {
        $pattern = '@((?<name>[^:]+):)?(?<values>.*)@';
        preg_match($pattern,$string,$matches);
        if ( ! empty($matches['name'])) $this->name = $matches['name'];
        $values = trim($matches['values'],',');
        if (empty($values)) return $this;
        $values = preg_split('@,@',$values);
        foreach($values as $value) {
            $this->addValue($value);
        }
        return $this;
    }


}