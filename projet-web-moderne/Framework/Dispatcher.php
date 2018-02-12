<?php


namespace m2i\framework;


class Dispatcher
{
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var string
     */
    private $controllerNameSpace;

    /**
     * Dispatcher constructor.
     * @param RouterInterface $router
     * @param string $controllerNameSpace
     */
    public function __construct(RouterInterface $router, $controllerNameSpace)
    {
        $this->router = $router;
        $this->controllerNameSpace = $controllerNameSpace;
    }

    /**
     *  Instancie une classe controleur et exécute une méthode action avec paramètres.
     */
    public function dispatch()
    {
        $className = $this->controllerNameSpace . $this->router->getControllerName();
        $controllerInstance = new $className();    // La classe est contenue dans la variable $className
        // Exécution de la méthode actionName sur controllerInstance
        // En passant les paramètres actionParameters
        call_user_func_array([$className, $this->router->getActionName()], $this->router->getActionParameters()
        );
    }


}