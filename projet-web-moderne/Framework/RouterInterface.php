<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 12/02/2018
 * Time: 14:30
 */

namespace m2i\framework;

interface RouterInterface
{
    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return string
     */
    public function getControllerName();

    /**
     * @return string
     */
    public function getActionName();

    /**
     * @return array
     */
    public function getActionParameters();
}