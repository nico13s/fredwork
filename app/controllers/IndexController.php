<?php

class IndexController extends ControllerBase {

    public function indexAction() {
        $this->view->countProfiles = Profile::count();
    }

}

