<?php

class CFrontController
{

    public function run ($path) {
        $method = $_SERVER['REQUEST_METHOD'];

        $resource = explode("/", $path);

        array_shift($resource);
        array_shift($resource);

        if ($resource[0] != "api") {
            $controller = "C" . $resource[0];
            $dir = "Controller";
            $eledir = scandir($dir);

            if (in_array($controller . ".php", $eledir)) {
                if (isset($resource[1])) {
                    $function = $resource[1];
                    if (method_exists($controller, $function)) {

                        $param = array();
                    }
                }
            }
        }
    }
}