<?php
class DB{
    private static $dataBase;
    public static function getConnection(){

        if(self::$dataBase == null){
            $dataBase = new mysqli($_SERVER['SERVER_NAME'],'root','','jigr');
            if ($dataBase->connect_error) {
                die("Connection failed: " . $dataBase->connect_error);
            } 
        }
        mysqli_set_charset($dataBase, 'utf8');
        return $dataBase;
    }
}
?>
