<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository,
    Doctrine\ORM\QueryBuilder;

class PerguntaRepository extends EntityRepository
{

    public function fetchPairs()
    {
        $entities = $this->findAll();

        $array = array();

        foreach ($entities as $entity) {
            $array[$entity->getId()] = $entity->getNome();
        }

        return $array;
    }

    public function queryCustom()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array('pergunta.id', 'pergunta.nome', 'COUNT(resposta.idResposta) as total'))
            ->addSelect('(SELECT count(respSim.resposta) FROM Application\Entity\Resposta as respSim WHERE respSim.resposta = 1 and respSim.idPergunta = pergunta.id group by respSim.idPergunta) as respostaSim')
            ->addSelect('(SELECT count(respNao.resposta) FROM Application\Entity\Resposta as respNao WHERE respNao.resposta = 0 and respNao.idPergunta = pergunta.id group by respNao.idPergunta) as respostaNao')
            ->from('Application\Entity\Pergunta', 'pergunta')
            ->leftJoin('Application\Entity\Resposta', 'resposta', 'WITH', 'resposta.idPergunta = pergunta.id')
            ->groupBy('pergunta.id', 'pergunta.id', 'pergunta.nome');
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

}
