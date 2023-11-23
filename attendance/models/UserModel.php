<?php

class UserModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function authenticateAdmin($username, $password)
    {
        $sql = "SELECT * FROM admins WHERE username = :username AND password = :password";
        $query = $this->db->prepare($sql);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();

        return ($query->rowCount() > 0);
    }
}
?>
