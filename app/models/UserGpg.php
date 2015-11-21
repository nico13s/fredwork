<?php

use Phalcon\Mvc\Model;

class UserGpg extends Model{

    public $id;

    public $user_id;

    public $gpg;

    /**
     * @return Integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param Integer $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return Integer
     */
    public function getUserId() {
        return $this->user_id;
    }

    /**
     * @param Integer $user_id
     */
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    /**
     * @return String
     */
    public function getGpg() {
        return $this->gpg;
    }

    /**
     * @param String $gpg
     */
    public function setGpg($gpg) {
        $this->gpg = $gpg;
    }

    public function initialize(){
        $this->belongsTo("user_id", "User", "id");
    }

}