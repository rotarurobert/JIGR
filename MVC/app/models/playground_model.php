<?php

class playgroundModel{
  
        public static function image(){
                if (isset($_GET['image'])) {
                        echo '<img alt="1" src="./images/'.$_GET['image'].'"></a></div>';
                }
        }
}
