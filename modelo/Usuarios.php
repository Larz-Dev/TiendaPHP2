<?php

class usuarios {


private $user;
private $id;
private $pass;


public function __construct(){}

public function setId($id){
$this -> id= $id;
}

public function setUser($user){

    $this -> user = $user;
}

public function getId(){
return $this->id;

}

public function getUser(){
    return $this->user;
    
    }
    


}