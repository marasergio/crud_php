<?php

class Dao extends PDO {
	private $host = 'localhost';
	private	$schema = 'spt';
	private	$user = 'root';
	private	$password = '';

	private $dsn;
    private static $instancia;
 
    public function Dao() {
    	$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->schema;
    	// O construtor abaixo é o do PDO
        parent::__construct($this->dsn,$this->user, $this->password);
    }
 
    public static function getInstance() {
        // Se a instancia não existe eu faço uma
        if(!isset( self::$instancia )){
            try {
                self::$instancia = new Dao();
            } catch ( Exception $e ) {
                echo 'Erro ao conectar';
                exit ();
            }
        }
        // Se já existe instancia na memória eu retorno ela
        return self::$instancia;
    }
}

?>