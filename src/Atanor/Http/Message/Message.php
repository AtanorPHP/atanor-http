<?php
declare(strict_types = 1);
namespace Atanor\Http\Message;

interface Message
{
    const CRLF = "\r\n";

    /**
     * Returns start line
     * @return string
     */
    public function getStartLine():string;

    /**
     * Return array of headers
     * @return array
     */
    public function getHeaders():array;

    /**
     * Returns message body
     * @return string
     */
    public function getBody():string;

    /**
     * @return string
     */
    public function __toString():string;
}