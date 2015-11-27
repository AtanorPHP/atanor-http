<?php
declare(strict_types = 1);
namespace Atanor\Http\Uri\url;

use Atanor\Http\Uri\MutableStringObject;
use Atanor\Http\Uri\Path;

class UrlPath implements Path, MutableStringObject
{
    /**
     * List of segments
     * @var array
     */
    protected $segments = [];

    /**
     * @inheritdoc
     */
    public function fromString(string $pathString):MutableStringObject
    {
        $pathString = trim($pathString,'/');
        if (empty($pathString)) return $this;
        $segmentStrings = preg_split('@/@',$pathString);
        foreach ($segmentStrings as $segString) {
            $segment = new UrlSegment();
            $segment->fromString($segString);
            $this->segments[$segment->getName()] = $segment;
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


}
