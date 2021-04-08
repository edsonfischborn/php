<?php
/**
 * Conexão - Classe Conexão
 * @author Cândido Farias
 * @since 0.1
 */
class Connection {
    public static $instance;
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO(
                DB_SGBD.":host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES "."utf8")
            );
            
        }

        return self::$instance;
    }

}

?>