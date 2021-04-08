<?php

/**
 * spl_autoloader_register implementation.
 * @author Édson Fischborn
 */
class AutoLoader {
    private $paths = null;
    
    public function __construct(array $paths){
        $this->paths = $paths;

        $this->register();
    }
    
    private function includeFile($className){
        foreach($this->paths as $path){
            $path = rtrim($path, '/').'/'.$className.'.php';
            if(file_exists($path)){
                include $path;
            }
        }

        return null;
    }

    private function register(){
        spl_autoload_register(function($className) {
            $this->includeFile($className);
        });
    }
}
