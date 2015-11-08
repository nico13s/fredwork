<?php

use Phalcon\Mvc\Model;

class User extends Model {

    public $id;

    public $firstname;

    public $lastname;

    public $email;

    public $gpg_key;

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getGpgKey() {
        return $this->gpg_key;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getSource(){
        return "user";
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $gpg_key
     */
    public function setGpgKey($gpg_key) {
        $this->gpg_key = $gpg_key;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }



}