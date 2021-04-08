<?php

class HandleRequest {
    private $folderFileUtil = null;
    private $friendlyUrlUtil = null;

    private $controller = null;
    private $controllerName = null;
    private $defaultControllerName = 'home';
    private $controllerSuffix = "Controller";

    private $controllerDictionary = null;

    public function __construct(FolderFileUtilSkeleton $folderFileUtil, FriendlyUrlUtil $friendlyUrlUtil, array $controllerDictionary){
        $this->folderFileUtil = $folderFileUtil;
        $this->friendlyUrlUtil = $friendlyUrlUtil;
        $this->controllerDictionary = $controllerDictionary;

        $this->setController();
    }

    public function translateControllerName($name){
        $index = strtolower($name);
        return isset($this->controllerDictionary[$index]) ? 
            $this->controllerDictionary[$index] :
            $name;
    }

    private function getSafeControllerName($name){
        if($name){
            $name = str_replace($this->controllerSuffix, "", $name);
            $name = $this->translateControllerName($name);
            $name = ucfirst($name);
            return $name . $this->controllerSuffix;
        }

        return null;
    }

    private function setController(){
        $controllerName = null;
        $requestControllerName = $this->getSafeControllerName(
            $this->friendlyUrlUtil->getController()
        );

        if($this->folderFileUtil->isValidFile($requestControllerName)){
            $controllerName = $requestControllerName; 
        } else {
            $controllerName = $this->getSafeControllerName($this->defaultControllerName);
        }

        $this->controllerName = $controllerName;
        $this->controller = new $controllerName();
    }

    public function handle(){
        $action = $this->friendlyUrlUtil->getAction();
        $actionParams = $this->friendlyUrlUtil->getActionParams();

        if(method_exists($this->controller, $action)) {
            $rMethod = new ReflectionMethod($this->controller, $action);
            $paramsCount = count($rMethod->getParameters());

            if($actionParams && $paramsCount === 1) {
                $this->controller->$action($actionParams); 
            } elseif($paramsCount === 0) {
                $this->controller->$action();
            } else {
                $this->controller->index();
            }
        } else {
            $this->controller->index();
        }
    }
}