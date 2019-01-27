<?php

class searchModel{
        public static function items(){
                require_once '../app/core/DB.php';
                $database = DB::getConnection();
                $sql = "SELECT * FROM images";
                $result = mysqli_query($database, $sql);

                if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                                echo '<div><a href="./images/'.$row['name'].'"><img alt="1" src="./images/'.$row['name'].'"></a><p>'.$row['image_name'].'</p></div>';
                }
                } else {
                        echo "0 results";
                }
                mysqli_close($database);
        }
}
