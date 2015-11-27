<?php
declare(strict_types = 1);
namespace Atanor\Http\Message;

use Atanor\Http\Message\Header\Header;

interface MutableMessage
{
    /**
     * Adds header
     * @param Header $header
     * @return MutableMessage
     */
    public function addToHeader(Header $header):MutableMessage;

    /**
     * Removes header
     * @param Header $header
     * @return MutableMessage
     */
    public function removeFromHeaders(Header $header):MutableMessage;

    /**
     * Sets body value
     * @param string $body
     * @return MutableMessage
     */
    public function setBody(string $body):MutableMessage;

    /**
     * Appends content to body
     * @param string $body
     * @return MutableMessage
     */
    public function appendToBody(string $body):MutableMessage;
}