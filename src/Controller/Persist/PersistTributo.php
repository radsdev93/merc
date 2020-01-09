<?php

namespace RAdSDev93\MercLegacy\Controller\Persist;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Tributo;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class PersistTributo implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $tributo;

    public function handle()
    {
        if(isset($_POST['tid'])) {
            $tid = filter_input(
                INPUT_POST,
                'tid',
                FILTER_VALIDATE_INT
            );
        }

        $nome = filter_input(
            INPUT_POST,
            'nome',
            FILTER_SANITIZE_STRING
        );

        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        $valor_percentual = filter_input(
            INPUT_POST,
            'valor_percentual',
            FILTER_VALIDATE_FLOAT
        );

        $categoria_id = filter_input(
            INPUT_POST,
            'categoria_id',
            FILTER_VALIDATE_INT
        );

        $tipo = 'success';

        if (!is_null($tid) && $tid !== false) {
            $this->tributo = new Tributo($tid);
            $this->tributo->setNome($nome);
            $this->tributo->setDescricao($descricao);
            $this->tributo->setValorPercentual($valor_percentual);
            $this->tributo->setCategoriaId($categoria_id);
            $this->tributo->atualizar();
            $this->setFlashMessage($tipo, 'Tributo atualizado com sucesso!');
        } else {
            $this->tributo = new Tributo();
            $this->tributo->setNome($nome);
            $this->tributo->setDescricao($descricao);
            $this->tributo->setValorPercentual($valor_percentual);
            $this->tributo->setCategoriaId($categoria_id);
            $this->tributo->inserir();
            $this->setFlashMessage($tipo, 'Tributo registrado com sucesso!');
        }
        header('Location: /listar-tributos');
        exit;
    }
}
