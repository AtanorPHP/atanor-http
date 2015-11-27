<?php
declare(strict_types = 1);
namespace Atanor\Http\Message\Request;

use Atanor\Http\Message\Message;
use Atanor\Http\Uri\Uri;

interface Request extends Message
{
    /**
     * Returns HTTP verb
     * @return string
     */
    public function getMethod():string;

    /**
     * Returns Uri
     * @return Uri
     */
    public function getUri():Uri;
}