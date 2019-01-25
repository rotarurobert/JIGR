<?php


require_once "../app/models/playground_model.php";

class Playground extends Controller
{
  public function index(){
      $this->view('playground/playground');

  }

}
