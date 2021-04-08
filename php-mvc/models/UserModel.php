<?php

class UserModel extends SqlDataBase {
    function __construct() {
        parent::__construct(Connection::getInstance(), 'usuario');
    }

    public function auth(string $email, string $password): ?array {
        $where = ['email' => $email, 'senha' => md5($password)];
        $user = $this->select(['*'], $where);
        
        if(isset($user) && count($user) === 1){
            $user = json_decode(json_encode($user),true)[0];
            unset($user['senha']);

            return $user;
        }

        return null;
    }
}