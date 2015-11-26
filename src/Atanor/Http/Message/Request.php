<?php
declare(strict_types = 1);
namespace Atanor\Http\Message;

use Atanor\Http\Uri\Uri;

class Request implements Message
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var Uri
     */
    protected $uri;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @inheritDoc
     */
    public function getStartLine():string
    {
    }

    /**
     * @inheritDoc
     */
    public function getHeaders():array
    {
        return $this->headers;
    }

    /**
     * @inheritDoc
     */
    public function getBody():string
    {
        return $this->headers;
    }

    /**
     * @inheritDoc
     */
    public function __toString():string
    {
        // TODO: Implement __toString() method.
    }


}