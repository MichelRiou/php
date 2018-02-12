<?php

namespace m2i\monAppli\Controllers;

use m2i\framework\View;

class HelloControllers
{
    /**
     * @param string $name
     */
    public function englishAction(string $name)
    {
        $view = new View();
        //print_r($view);
        var_dump($view->render("hello",['name'=>$name,'title'=>"ma page"]));
        echo $view->render("hello",['name'=>$name,'title'=>"ma page"]);
    }

    /**
     * @param string $name
     */
    public function frenchAction(string $name)
    {
        $view = new View();
        echo $view->render("Bonjour",['name'=>$name,'title'=>"ma page"]);
    }
}