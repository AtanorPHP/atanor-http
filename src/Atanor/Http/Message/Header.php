<?php
declare(strict_types = 1);
namespace Atanor\Http\Message;

interface Header
{
    /**
     * Returns header  name
     * @return string
     */
    public function getName():string;

    /**
     * Returns header values
     * @return array
     */
    public function getValues():array;

    /**
     * Header constructor.
     * @param string $name
     * @param array  $values
     */
    public function __construct(string $name,array $values);

    /**
     * Returns header line
     * @return string
     */
    public function __toString():string;

}