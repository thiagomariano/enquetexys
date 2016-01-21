<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;

class RespostaRepository extends EntityRepository {

    public function fetchPairs() {
        $entities = $this->findAll();
        
        $array = array();
        
        foreach($entities as $entity) {
            $array[$entity->getId()] = $entity->getNome();
        }
        
        return $array;
    }
    
}
