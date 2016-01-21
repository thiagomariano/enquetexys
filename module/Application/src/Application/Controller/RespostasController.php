<?php

namespace Application\Controller;

use     Zend\View\Model\ViewModel;

class RespostasController extends CrudController
{

    public function __construct()
    {
        $this->entity = "Application\Entity\Respostas";
        $this->title = 'Resposta ';
        $this->form = "Application\Form\Respostas";
        $this->service = "Application\Service\Respostas";
        $this->controller = "respostas";
        $this->route = "respostas";
        $this->paginaOrigem = $this->route;
    }
}
