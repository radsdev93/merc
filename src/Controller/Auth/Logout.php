<?php

namespace RAdSDev93\MercLegacy\Controller\Auth;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;

class Logout implements RequestHandlerInterface

{

    public function handle()
    {
        session_destroy();
        header('Location: /entrar');
    }
}
