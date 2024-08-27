<?php
require_once '../src/connectToDb/ConnectToDb.php';

class Login
{
    public connectToDb $connection;
    private const DB_NAME = 'admin';

    public function canConnect($username, $password)
    {
        $admin = $this->getUser($username);
        if(!empty($admin) && password_verify($password, $admin['password']))
            return true;
        return false;
    }


    public function getUser($username)
    {
        $query = 'SELECT * FROM ' . self::DB_NAME . ' WHERE username = :username';
        $userStatement = $this->connection->connectToDb()->prepare($query);
        $userStatement->execute([
            'username' => $username
        ]);

        $admin = $userStatement->fetch(PDO::FETCH_ASSOC);
        return $admin;
    }
}