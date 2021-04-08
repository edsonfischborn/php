<?php

/**
 * This is a definition of friendly url request helper.
 * @author Édson Fischborn
 */
interface FriendlyUrlUtilSkeleton {
    public function getRequest(): ?string;
    public function getController(): ?string;
    public function getAction(): ?string;
    public function getActionParams(): ?array;
}

/**
 * Implementation of RequestUtilSkeleton interface.
 * @author Édson Fischborn
 */
class FriendlyUrlUtil implements FriendlyUrlUtilSkeleton {
    private $requestVariable = null;

    public function __construct($requestVariable = "request") {
        $this->requestVariable = $requestVariable;

        $this->setRequest();
    }

    private function setRequest() {
        if(isset($_GET[$this->requestVariable])) {
            $this->request = explode('/', $_GET[$this->requestVariable]);
        }
    }

    public function getRequest(): ?string {
        return $this->request;
    }

    public function getController(): ?string {
        return isset($this->request[0]) ? $this->request[0] : null;
    }

    public function getAction(): ?string {
        return isset($this->request[1]) ? $this->request[1] : null;
    }

    public function getActionParams(): ?array {
        return isset($this->request[2]) ? array_slice($this->request, 2) : null;
    }
}