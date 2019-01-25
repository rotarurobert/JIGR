<?php


require_once "../app/models/main_model.php";

class Main extends Controller
{
  public function index(){
      $this->view('main/index');

  }

}
