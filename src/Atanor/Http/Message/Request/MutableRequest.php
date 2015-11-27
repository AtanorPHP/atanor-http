<?php
declare(strict_types = 1);
namespace Atanor\Http\Message\Request;

use Atanor\Http\Message\MutableMessage;
use Atanor\Http\Uri\Uri;

interface MutableRequest extends MutableMessage
{
    /**
     * Sets request uri
     * @param Uri $uri
     * @return MutableRequest
     */
    public function setUri(Uri $uri):MutableRequest;

    /**
     * Set request from globals
     * @return MutableRequest
     */
    public function fromPhpGlobals():MutableRequest;

    /**
     * Sets method
     * @param string $method
     * @return MutableRequest
     */
    public function setMethod(string $method):MutableRequest;
}