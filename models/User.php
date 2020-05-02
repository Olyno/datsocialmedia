<?php

class User {

  private $login;
  private $email;
  private $username;
  
  public function __construct($data) {
    $this -> login = $data['login'];
    $this -> email = $data['email'];
    $this -> username = '@' . $data['login'];
  }

  public function getLogin() {
    return $this -> login;
  }

  public function getEmail() {
    return $this -> email;
  }

  public function getUsername() {
    return $this -> username;
  }

}