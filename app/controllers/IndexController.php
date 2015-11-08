<?php

class IndexController extends ControllerBase {

    public function indexAction() {
        $this->view->countUsers = User::count();
    }

}

