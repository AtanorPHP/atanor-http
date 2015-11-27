<?php
declare(strict_types = 1);
namespace Atanor\Http\Message\Request;

use Atanor\Http\Message\Header\DefaultHeader;
use Atanor\Http\Message\Header\Header;
use Atanor\Http\Message\MutableMessage;
use Atanor\Http\Uri\Uri;
use Atanor\Http\Uri\Url\HttpUrl;
use Atanor\Http\Uri\url\UrlPath;

class DefaultRequest implements Request, MutableRequest
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

    /**
     * @inheritDoc
     */
    public function addToHeader(Header $header):MutableMessage
    {
        $name = $header->getName();
        if (isset($this->headers[$name])) {
            foreach($header->getValues() as $value) {
                $this->headers[$name]->addValue($value);
            }
        }
        else {
            $this->headers[$name] = $header;
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeFromHeaders(Header $header):MutableMessage
    {
        // TODO: Implement removeFromHeaders() method.
    }

    /**
     * @inheritDoc
     */
    public function setBody(string $body):MutableMessage
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function appendToBody(string $body):MutableMessage
    {
        $this->body .= $body;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setUri(Uri $uri):MutableRequest
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function fromPhpGlobals():MutableRequest
    {
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $uri = new HttpUrl();
        $uri->setScheme($_SERVER['REQUEST_SCHEME']);
        $uri->setHost($_SERVER['HTTP_HOST']);

        preg_match('@(?<path>.+)(\?(?<query>[^#]+))?(#(?<fragment>[^#?]))?@',$_SERVER['REQUEST_URI'],$parts);
        $path = new UrlPath();
        $path->fromString($parts['path']);
        if ( ! empty($path)) $uri->setPath($path);
        if ( ! empty($parts['query'])) $uri->setQuery($parts['query']);
        if ( ! empty($parts['fragment'])) $uri->setFragment($parts['fragment']);

        $acceptHeader = new DefaultHeader('Accept',[]);
        $acceptHeader->fromString($_SERVER['HTTP_ACCEPT']);
        $this->addToHeader($acceptHeader);
        $connectionHeader = new DefaultHeader('Connection',[]);
        $connectionHeader->fromString($_SERVER['HTTP_CONNECTION']);
        $this->addToHeader($connectionHeader);
        $cacheControlHeader = new DefaultHeader('Cache-Control',[]);
        $cacheControlHeader->fromString($_SERVER['HTTP_CACHE_CONTROL']);
        $this->addToHeader($cacheControlHeader);

        $this->setUri($uri);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getMethod():string
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function getUri():Uri
    {
        return $this->uri;
    }

    /**
     * @inheritDoc
     */
    public function setMethod(string $method):MutableRequest
    {
        $this->method = $method;
        return $this;
    }



}