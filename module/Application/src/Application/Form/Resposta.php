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
class Resposta extends Form
{
    public function __construct($name = null, $options = null)
    {

        parent::__construct('resposta', $options);
        $this->setInputFilter(new RespostaFilter());
        $this->setAttribute('method', 'Post');

        $id = new Element\Hidden('id');
        $this->add($id);

        $nome = new Element\Text("nome");
        $nome->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Entre com a nome',
            'disabled' => true,
        ));
        $this->add($nome);

        $resposta = new Element\Radio('resposta');
        $resposta->setValueOptions(array(
            '1' => 'Sim',
            '0' => 'Não',
        ));
        $this->add($resposta);

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