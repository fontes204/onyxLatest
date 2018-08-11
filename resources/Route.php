<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 18/04/17
 * Time: 18:34
 */
class Route
{
    protected $route;
    protected $user;

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


}