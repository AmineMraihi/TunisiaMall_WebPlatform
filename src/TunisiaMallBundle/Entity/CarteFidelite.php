<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarteFidelite
 *
 * @ORM\Table(name="carte_fidelite", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class CarteFidelite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_carte_fidelite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCarteFidelite;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_point", type="integer", nullable=false)
     */
    private $nbPoint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;



    /**
     * Get idCarteFidelite
     *
     * @return integer
     */
    public function getIdCarteFidelite()
    {
        return $this->idCarteFidelite;
    }

    /**
     * Set nbPoint
     *
     * @param integer $nbPoint
     *
     * @return CarteFidelite
     */
    public function setNbPoint($nbPoint)
    {
        $this->nbPoint = $nbPoint;

        return $this;
    }

    /**
     * Get nbPoint
     *
     * @return integer
     */
    public function getNbPoint()
    {
        return $this->nbPoint;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return CarteFidelite
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set idUser
     *
     * @param \TunisiaMallBundle\Entity\User $idUser
     *
     * @return CarteFidelite
     */
    public function setIdUser(\TunisiaMallBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \TunisiaMallBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
