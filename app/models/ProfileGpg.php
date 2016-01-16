<?php

use Phalcon\Mvc\Model;

class ProfileGpg extends Model{

    public $id;

    public $profile_id;

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
    public function getProfileId() {
        return $this->profile_id;
    }

    /**
     * @param Integer $profile_id
     */
    public function setProfileId($profile_id) {
        $this->profile_id = $profile_id;
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
        $this->belongsTo("profile_id", "Profile", "id");
    }

}