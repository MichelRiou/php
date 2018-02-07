<?php

class HtmlLink extends HtmlTag
{

public function __construct($href,$content,$attributes=[])
{
    $attributes["href"] = $href;
    parent::__construct("a",$content,$attributes);


}
}