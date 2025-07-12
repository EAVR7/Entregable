<?php
    class DB{
        public static function conectar(){
            $url="mysql: host=localhost; dbname=TecnoSoluciones";
            $user="root";
            $password="970091413";
            $cn=new PDO($url, $user, $password);
            return $cn;
        }
    }
?>