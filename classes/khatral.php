<?php
//Khatral API version 0.0.5-r700
//This is a database handler class that is used to handle all the database query with condition checking and many more
//This is a improved version of a previously deprecated Softquery API
//Developed by Aravindh from Arvin Soft
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
?>