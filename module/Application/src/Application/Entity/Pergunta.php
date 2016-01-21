<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="perguntas")
 * @ORM\Entity(repositoryClass="Application\Entity\PerguntaRepository")
 */
class Pergunta {

    public function __construct($options = null) {
        Configurator::configure($this,$options);
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function __toString() {
        return $this->nome;
    }

    public function toArray() {
        return array('id'=>$this->getId(),'nome'=>$this->getNome());
    }
}
