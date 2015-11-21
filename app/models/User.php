<?php

use Phalcon\Mvc\Model;

class User extends Model {

    public $id;

    public $firstname;

    public $lastname;

    public $email;

    /**
     * @return String
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return String
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @return Integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * @return String
     */
    public function getSource(){
        return "user";
    }

    public function initialize(){
        $this->hasMany("id", "UserGpg", "user_id");
    }

    /**
     * @param String $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * @param Integer $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @param String $lastname
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

}