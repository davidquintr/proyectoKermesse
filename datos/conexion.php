<?php

class Conexion
{
    // Atributos
    private $pdo;
    private $pdoStmt;
    private $serverName;
    private $dbName;
    private $userName;
    private $pwd;

    // Metodos
    public function conectar()
	{
        $serverName = '192.168.1.30:3306';
        $dbName = 'dbkermesse';
        $userName = 'myuser';                      
        $pwd = 'mypass';

		try{
            
			$this->pdo = new PDO("mysql:host={$serverName};dbname={$dbName}",$userName,$pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo; 		        
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function desconectar()
    {
        try
		{
            $pdo = null;
            return $pdo; 		        
        }
        catch(PDOException $e)
		{
            echo "ERROR: ";
			die($e->getMessage());
		}
    }

}

/* Testing */
$con = new Conexion();
$con->conectar();
$con->desconectar();
