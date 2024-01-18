<?php

class DBConnection {
    private $connection;

    public function __construct($config) 
    {
        // $config = parse_ini_file('config/config.ini');
        $this->connection = new mysqli ($config['host'], 
                                        $config['login'], 
                                        $config['pass'], 
                                        $config['db']);

        if ($this->connection->connect_error) {
            die('Ошибка подключения к БД:' . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }
}
