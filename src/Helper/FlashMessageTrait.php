<?php

namespace RAdSDev93\MercLegacy\Helper;

trait FlashMessageTrait
{
    public function setFlashMessage($type, $message)
    {
        $_SESSION['mensagem'] = $message;
        $_SESSION['tipo_mensagem'] = $type;
    }
}
