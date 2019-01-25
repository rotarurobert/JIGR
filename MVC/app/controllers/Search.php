<?php


require_once "../app/models/search_model.php";

class Search extends Controller
{
  public function index(){
      $this->view('search/search');

  }

  public function uploadImage(){
    
    $jsonData = file_get_contents('php://input');
    $jsonData = json_decode($jsonData);

  }

}
