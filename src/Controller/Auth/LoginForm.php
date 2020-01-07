<?php


namespace RAdSDev93\MercLegacy\Controller\Auth;


use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class LoginForm implements RequestHandlerInterface
{
    use RenderViewTrait;

    public function handle()
    {
        echo $this->renderView('login/login_form.php', ['titulo' => 'Acesso - Merc!']);
    }
}
