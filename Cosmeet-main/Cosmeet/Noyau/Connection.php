<?php

final class Connection
{

    public PDO $pdo;

    private static ?self $instance = null;
    private const db_server_name = "mysql-cosmeet.alwaysdata.net";
    private const db_username = "cosmeet";
    private const db_password = "xt&D4S3rC8px8$&n";
    private const db_name = "cosmeet_bd";

    private function __construct()
    {
        $this->pdo = new PDO(
            sprintf('mysql:dbname=%s;host=%s', self::db_name, self::db_server_name),
            self::db_username,
            self::db_password
        );
    }

    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function insert(string $S_table, array $A_parametres): bool
    {
        $attributs = implode(', ', array_keys($A_parametres));
        $valueKeys = implode(', ', array_map(
            fn (string $value) => ':' . $value,
            array_keys($A_parametres)
        ));
        $query = sprintf(' Insert into %s (%s) values  (%s)', $S_table, $attributs, $valueKeys);
        var_dump($query);
        $stmt = $this->pdo->prepare($query);
        foreach ($A_parametres as $attribut => $value) {
            $stmt->bindValue(':' . $attribut, $value);
        }
        $value = $stmt->execute();
        if (false === $value) {
            throw new RuntimeException(
                sprintf(
                    "Cannot insert value for table %s and value %s. SQL error code : %s. SQL error info : %s",
                    $S_table,
                    json_encode($A_parametres),
                    $stmt->errorCode(),
                    json_encode($stmt->errorInfo())
                )
            );
        }
        return $value;
    }

    public function delete(string $S_table, $where)
    {
        $query = "DELETE FROM $S_table WHERE $where";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            die('Error : ' . $e->getMessage());
        }
    }

    public function update(string $S_table, $data, $where)
    {
        $query = "UPDATE $S_table SET ";
        $parameters = array();
        foreach ($data as $key => $value) {
            $parameters[] = "$key = :$key";
        }
        $query .= implode(', ', $parameters);
        $query .= " WHERE $where";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            die('Error : ' . $e->getMessage());
        }
    }
}