<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 04/10/2015
 * Time: 18:42
 */

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class PerguntaFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'nome',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Por favor, preencher o campo Enquete.'
                        )
                    )
                ),
            )
        ));
    }
}