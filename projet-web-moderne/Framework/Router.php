<?php

namespace m2i\framework;


class Router
{
    /**
     * @var string
     */
    private $url;

    /**
     * Router constructor.
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;

        var_dump($this->url);
    }


}