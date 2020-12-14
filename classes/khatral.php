<?php
//Khatral API version 0.0.4-r600
//This is a database handler class that is used to handle all the database queyr with condition checking and many more
//This is a improved version of a previously deprecated Softquery API
class Khatral{
    private static function connect(){
        $pdo = new PDO('mysql:host=localhost;dbname=valai;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    }
    public static function khquery($query, $params){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
        
    }
    public static function khquerypar($query){
        $statement = self::connect()->prepare($query);
        $statement->execute();
        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
        
    }
    public static function khdisplay(){
        echo 'hello world';
    }
}
// echo '<img src="../images/valaiweb.svg" style="width: 32px;"><h3>Khatral API</h3><br />This is a api file and it will not execute on its own. <br />Please refer documentation for more information on how to access it and work with it. <br />Copyright &copy; 2020 Valainet. All Rights Reserved.';
?>