<?php

namespace App\Cinetech\Models;

use App\Cinetech\Manager\ValidatorManager;
use App\Cinetech\Manager\PasswordHashManager;



class Users extends PasswordHashManager
{
  // #[ValidatorManager('numeric')]
  private $id;
  // #[ValidatorManager('login')]
  private $login;
  //  #[ValidatorManager('email')]
  private $email;
  // #[ValidatorManager('password')]
  private $password;
  // #[ValidatorManager('firstname')]
  private $firstname;
  //  #[ValidatorManager('lastname')]
  private $lastname;
  private $birthday;
  private $id_session_tmdb;


  public function __construct(?array $data = null)
  {
    // $this->id           = $data['id']                          ?? null;
    $this->login           = $data['login']                         ?? "";
    $this->password        = isset($data['password']) ? $this->hash($data['password']) : "";
    $this->birthday        = isset($data['birthday']) ? $this->setDateTime($data['birthday']) :  "";
    $this->firstname       = $data['firstname']                     ?? "";
    $this->lastname        = $data['lastname']                      ?? "";
    $this->id_session_tmdb = $data['id_session_tmdb']               ?? "";
    $this->email           = $data['email']                         ?? "";
    //  $this->id_favorites    = $data['id_favorites']           ?? "";
    //  $this->id_comments     = $data['id_comments']            ?? "";
  }

  /* ----------------------------------- METHOD MAGIC ------------------------------ */
  public function __get(string $name)
  {
    return $this->$name;
  }

  public function __set(string $property, mixed $value)
  {
  }

  /* ----------------------------------- GETTER / SETTER ------------------------------ */
  public function setDateTime(string $dateString)
  {
    $newDate = new \DateTime($dateString);
    return $newDate->format("Y-m-d H:i:s");
  }

  /**
   * Get the value of birthday
   */
  public function getBirthday()
  {
    $newDate = new \DateTime($this->birthday);
    return $newDate->format("Y-m-d");
  }
}
