<?php
class DB{
    private static $dataBase;
    public static function getConnection(){

        if(self::$dataBase == null){
            $dataBase = new mysqli($_SERVER['HTTP_HOST'],'root','','jigr');
        }
        mysqli_set_charset($dataBase, 'utf8');
        return $dataBase;
    }
}
?>
