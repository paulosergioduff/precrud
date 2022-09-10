<?php


class Database
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function getConnection()
    {
        $this->conn = null;       
        $this->db_name = getenv('DB_NAME');
        $this->host = getenv('HOST_ENV');
        $this->username = getenv('USER_ENV');
        $this->password = getenv('PASS_ENV');

        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this
                ->conn
                ->exec("set names utf8");
        }
        catch(PDOException $exception)
        {
            echo "Erro ao conectar ao banco <<";
        }

        return $this->conn;
    }
}

?>
