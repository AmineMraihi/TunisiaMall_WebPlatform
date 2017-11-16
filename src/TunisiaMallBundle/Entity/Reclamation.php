<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="id_user", columns={"id_reclamant"}), @ORM\Index(name="id_P_reclame", columns={"id_P_reclame"})})
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_reclamation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_reclamant", type="integer", nullable=false)
     */
    private $idReclamant;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_P_reclame", referencedColumnName="id_user")
     * })
     */
    private $idPReclame;



    /**
     * Get idReclamation
     *
     * @return integer
     */
    public function getIdReclamation()
    {
        return $this->idReclamation;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Reclamation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Reclamation
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set idReclamant
     *
     * @param integer $idReclamant
     *
     * @return Reclamation
     */
    public function setIdReclamant($idReclamant)
    {
        $this->idReclamant = $idReclamant;

        return $this;
    }

    /**
     * Get idReclamant
     *
     * @return integer
     */
    public function getIdReclamant()
    {
        return $this->idReclamant;
    }

    /**
     * Set idPReclame
     *
     * @param \TunisiaMallBundle\Entity\User $idPReclame
     *
     * @return Reclamation
     */
    public function setIdPReclame(\TunisiaMallBundle\Entity\User $idPReclame = null)
    {
        $this->idPReclame = $idPReclame;

        return $this;
    }

    /**
     * Get idPReclame
     *
     * @return \TunisiaMallBundle\Entity\User
     */
    public function getIdPReclame()
    {
        return $this->idPReclame;
    }
}
