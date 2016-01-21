<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 07/10/2015
 * Time: 22:45
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;

class Resposta extends AbstractService
{

    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = "Application\Entity\Resposta";
    }

    public function insert(array $data)
    {
        $entity = new $this->entity($data);
        $entity->setIdPergunta($data['id']);
        $entity->setDtResposta(date('Y-m-d H:i:s'));
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;

    }
}




