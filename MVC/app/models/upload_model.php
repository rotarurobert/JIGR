<?php

class UploadModel{

        public function upload(){
                if(isset($_POST["submit"])) {
                        ob_end_clean();
                        $target_dir = "./images/";
                        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["pic"]["tmp_name"]);
                        if($check !== false) {
                                $uploadOk = 1;
                        } else {
                                echo '<script>alert("File is not an image.");</script>';
                                $uploadOk = 0;
                                }
                                // Check if file already exists
                                if (file_exists($target_file)) {
                                        echo '<script>alert("Sorry, file already exists.");</script>';
                                        $uploadOk = 0;
                                }
                                // Check file size
                                if ($_FILES["pic"]["size"] > 500000) {
                                        echo '<script>alert("Sorry, your file is too large.");</script>';
                                        $uploadOk = 0;
                                }
                                // Allow certain file formats
                                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                && $imageFileType != "gif" ) {
                                        echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
                                        $uploadOk = 0;
                                }
                                // Check if $uploadOk is set to 0 by an error
                                if ($uploadOk == 0) {
                                        echo '<script>alert("Sorry, your file was not uploaded.");</script>';
                                // if everything is ok, try to upload file
                                } else {
                                        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                                                require_once '../app/core/DB.php';
                                                $database = DB::getConnection();
                                                $sql = "INSERT INTO images (image_name, name) VALUES ('".$_POST["picName"]."', '".basename($_FILES["pic"]["name"])."')";
                                                if ($database->query($sql) === TRUE) {
                                                        echo '<script>alert("The file '. basename( $_FILES["pic"]["name"]). ' has been uploaded.");</script>';
                                                }
                                                $database->close();
                                                
                                                
                                        } else {
                                                echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
                                        }
                                }
                }
        }

}
