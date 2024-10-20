<?php
    /**
     * Generate a URL to a named route.
     *
     * @param  string  $name
     * @param  array   $parameters
     * @param  bool    $absolute
     * @param  \Illuminate\Routing\Route  $route
     * @return string
     */
    function route($name, $parameters = [], $absolute = true, $route = null)
   {
    if (!isset($parameters['lang'])) $parameters['lang'] = App::getLocale();
        
        return app('url')->route($name, $parameters, $absolute, $route);
    }