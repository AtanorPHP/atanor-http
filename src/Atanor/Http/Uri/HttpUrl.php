<?php
declare(strict_types = 1);
namespace Atanor\Http\Uri;

class HttpUrl implements Url,MutableStringObject
{
    /**
     * Url scheme
     * @var string
     */
    protected $scheme = 'http';

    /**
     * User
     * @var string
     */
    protected $user = '';

    /**
     * User password
     * @var string
     */
    protected $password = '';

    /**
     * Host
     * @var string
     */
    protected $host = '';

    /**
     * Port number
     * @var int
     */
    protected $port = 80;

    /**
     * Path
     * @var Path
     */
    protected $path;

    /**
     * Parameters
     * @var array
     */
    protected $params = [];

    /**
     * Query string
     * @var string
     */
    protected $query = '';

    /**
     * Fragment
     * @var string
     */
    protected $fragment = '';

    /**
     * @inheritdoc
     */
    public function fromString(string $string):MutableStringObject
    {
        $regExp = '@';
        $regExp .= '((?<scheme>[a-z]+)://)?';
        $regExp .= '((?<user>[a-zA-Z0-9]+)(:(?<password>[a-zA-Z0-9]+))?\@)?';
        $regExp .= '(?<host>[^/?#:]+)';
        $regExp .= '(:(?<port>[0-9]+))?';
        $regExp .= '(?<path>[^?#]+)?';
        $regExp .= '(\?(?<query>[^#]+))?';
        $regExp .= '(#(?<fragment>.+))?';
        $regExp .= '@';
        preg_match($regExp,$string,$parts);
        if (isset($parts['scheme'])) $this->scheme = $parts['scheme'];
        if (isset($parts['port']) && ! empty($parts['port'])) $this->port = (int)$parts['port'];
        if (isset($parts['user'])) {
            $this->user = $parts['user'];
            if (isset($parts['password'])) $this->password = $parts['password'];
        }
        if (isset($parts['host'])) $this->host = $parts['host'];
        if (isset($parts['path'])) {
            $this->path = new UrlPath();
            $this->path->fromString($parts['path']);
        }
        if (isset($parts['query'])) $this->query = $parts['query'];
        if (isset($parts['fragment'])) $this->fragment = $parts['fragment'];
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getScheme():string
    {
        return $this->scheme;
    }

    /**
     * @inheritDoc
     */
    public function getUser():string
    {
        return $this->user;
    }

    /**
     * @inheritDoc
     */
    public function getPassword():string
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getHost():string
    {
        return $this->host;
    }

    /**
     * @inheritDoc
     */
    public function getPort():int
    {
        return $this->port;
    }

    /**
     * @inheritDoc
     */
    public function getPath():Path
    {
        return $this->path;
    }

    /**
     * @inheritDoc
     */
    public function getParams():array
    {
        return $this->params;
    }

    /**
     * @inheritDoc
     */
    public function getQuery():string
    {
        return $this->query;
    }

    /**
     * @inheritDoc
     */
    public function getFragment():string
    {
        return $this->fragment;
    }

    /**
     * @inheritDoc
     */
    public function __toString():string
    {
        // TODO: Implement __toString() method.
    }


}