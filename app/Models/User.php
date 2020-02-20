<?php

namespace App\Models;

class User {

  private $first_name;
  private $last_name;
  private $email;

  public function setFirstName(string $firstName = null)
  {
    $this->first_name = trim($firstName);
  }

  public function setLastName(string $lastName = null)
  {
    $this->last_name = trim($lastName);
  }

  public function setEmail(string $email = null)
  {
    $this->email = trim($email);
  }

  public function getFirstName()
  {
    return $this->first_name;

  }

  public function getLastName()
  {
    return $this->last_name;
  }

  public function getFullName()
  {
    return implode(' ', [$this->first_name, $this->last_name]);
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getEmailVariabls()
  {
    return [
        'full_name' => $this->getFullName(),
        'email' => $this->getEmail(),
    ];
  }

}
