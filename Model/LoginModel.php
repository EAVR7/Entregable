<?php
require_once './config/DB.php';

class LoginModel {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function verificar($email, $password) {
        $sql = "SELECT * FROM usuario WHERE email = :email AND password = MD5(:password)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':email', $email);
        $ps->bindParam(':password', $password);
        $ps->execute();
        return $ps->fetch(PDO::FETCH_ASSOC);
    }
}
?>
