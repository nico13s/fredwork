<?php

class ProfileController  extends ControllerBase {

    public function indexAction() {
        $aProfile = Profile::find();
        $this->view->aProfile = $aProfile;
//        echo '<pre>';
//        // Traversing with a foreach
//        foreach ($aUser as $user) {
//            var_dump(get_class($user), $user->getId());
//        }
//        var_dump(
//            $aUser->current(),
//            $aUser->count(),
//            get_class($aUser),
//            get_class_methods($aUser),
//            ($this->view->aUser)
//        );die;
//        $this->view->count = rand(0,10);
//        error_log($this->view->count);
//        $this->view->aUser = 'test';
//        echo 'ici';die;
    }
}