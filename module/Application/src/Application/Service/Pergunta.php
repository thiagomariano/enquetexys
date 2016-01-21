<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 07/10/2015
 * Time: 22:45
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;

class Pergunta extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "Application\Entity\Pergunta";
    }

}




