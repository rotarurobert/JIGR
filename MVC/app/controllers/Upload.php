<?php


require_once "../app/models/upload_model.php";

class Upload extends Controller
{
  public function index(){
      $this->view('upload/upload');

  }

}
