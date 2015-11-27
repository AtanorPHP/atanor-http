<?php
declare(strict_types = 1);
namespace Atanor\Http\Uri\Url;

use Atanor\Http\Uri\Uri;
use Atanor\Http\Uri\Path;

interface Url extends Uri
{
    /**
     * Returns url scheme
     * @return string
     */
    public function getScheme():string;

    /**
     * Returns user
     * @return string
     */
    public function getUser():string;

    /**
     * Returns password
     * @return string
     */
    public function getPassword():string;

    /**
     * Returns host
     * @return string
     */
    public function getHost():string;

    /**
     * Retunrs port number
     * @return int
     */
    public function getPort():int;

    /**
     * Return path
     * @return Path
     */
    public function getPath():Path;

    /**
     * Returns params
     * @return array
     */
    public function getParams():array;

    /**
     * Returns query
     * @return string
     */
    public function getQuery():string;

    /**
     * Returns fragment
     * @return string
     */
    public function getFragment():string;
}