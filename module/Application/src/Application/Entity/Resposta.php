<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="respostas")
 * @ORM\Entity(repositoryClass="Application\Entity\RespostaRepository")
 */
class Resposta
{

    public function __construct($options = null)
    {
        Configurator::configure($this, $options);
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $idResposta;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $resposta;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $idPergunta;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $dtResposta;

    /**
     * @return string
     */
    public function getDtResposta()
    {
        return $this->dtResposta;
    }

    /**
     * @param string $dtResposta
     */
    public function setDtResposta($dtResposta)
    {
        $this->dtResposta = $dtResposta;
    }

    /**
     * @return int
     */
    public function getIdResposta()
    {
        return $this->idResposta;
    }

    /**
     * @return mixed
     */
    public function getPerguntas()
    {
        return $this->perguntas;
    }

    /**
     * @param mixed $perguntas
     */
    public function setPerguntas($perguntas)
    {
        $this->perguntas = $perguntas;
    }


    /**
     * @param int $idResposta
     */
    public function setIdResposta($idResposta)
    {
        $this->idResposta = $idResposta;
    }

    /**
     * @return string
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * @param string $resposta
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;
    }

    /**
     * @return int
     */
    public function getIdPergunta()
    {
        return $this->idPergunta;
    }

    /**
     * @param int $idPergunta
     */
    public function setIdPergunta($idPergunta)
    {
        $this->idPergunta = $idPergunta;
    }

    public function toArray()
    {
        return array(
            'idResposta' => $this->getIdResposta(),
            'nome' => $this->getNome(),
            'idPergunta' => $this->getIdPergunta(),
            'dtResposta' => $this->getDtResposta());
    }
}
