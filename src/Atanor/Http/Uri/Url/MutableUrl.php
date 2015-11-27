<?php
declare(strict_types = 1);
namespace Atanor\Http\Uri\Url;

use Atanor\Http\Uri\Path;

interface MutableUrl
{
    /**
     * Set scheme
     * @param string $scheme
     * @return MutableUrl
     */
    public function setScheme(string $scheme):MutableUrl;

    /**
     * Set host
     * @param string $host
     * @return MutableUrl
     */
    public function setHost(string $host):MutableUrl;

    /**
     * Set query string
     * @param string $query
     * @return MutableUrl
     */
    public function setQuery(string $query):MutableUrl;

    /**
     * Set fragment
     * @param string $fragment
     * @return MutableUrl
     */
    public function setFragment(string $fragment):MutableUrl;

    /**
     * Set url path
     * @param Path $path
     * @return MutableUrl
     */
    public function setPath(Path $path):MutableUrl;
}