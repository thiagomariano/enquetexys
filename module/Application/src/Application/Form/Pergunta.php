<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element;


/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 04/10/2015
 * Time: 18:04
 */
class Pergunta extends Form
{
    public function __construct(array $categorias = null, array $membros = null, array $cidades = null, array $estados = null, $name = null, $options = null)
    {

        parent::__construct('membro', $options);
        $this->setInputFilter(new PerguntaFilter());
        $this->setAttribute('method', 'Post');

        $id = new Element\Hidden('id');
        $this->add($id);

        $nome = new Element\Text("nome");
        $nome->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Entre com a pergunta',
        ));
        $this->add($nome);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success col-xs-6 col-md-5 btnSpacer'
            )
        ));
    }
}