<?php

namespace Auth\App;
class Connection_db
{

    private string $db_host = 'localhost';
    private string $db_name = 'test2';
    private string $db_login = 'root';
    private string $db_password = '';
    public \PDO $connection_db;

    public function __construct()
    {
        $this->connection_db = $this->connection();
    }

    private function connection(): \PDO
    {
        return new \PDO("mysql:host={$this->db_host};dbname={$this->db_name};charset=utf8", "{$this->db_login}", "{$this->db_password}");
    }

    public function createFields($query): void
    {
        $db = $this->connection();
        $order = $db->prepare($query);
        $order->execute();
    }
    public function getUser($query)
    {
        $db = $this->connection();
        $order = $db->prepare($query);
        $order->execute();
        return $order->fetch(\PDO::FETCH_ASSOC);
    }

}