<?php

namespace RAdSDev93\MercLegacy\Helper;

trait RenderViewTrait
{
    public function renderView($viewPath, $dataArray)
    {
        extract($dataArray);
        ob_start();
        require __DIR__ . '/../../view/' . $viewPath;
        $html = ob_get_clean();
        return $html;
    }
}
