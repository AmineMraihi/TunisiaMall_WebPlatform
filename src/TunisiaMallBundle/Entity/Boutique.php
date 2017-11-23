<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boutique
 *
 * @ORM\Table(name="boutique")
 * @ORM\Entity(repositoryClass="TunisiaMallBundle\Repository\BoutiqueRepository")
 */
class Boutique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_boutique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBoutique;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=50, nullable=true)
     */
    private $position;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation",type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expiration",type="date", nullable=true)
     */
    private $dateexpiration;





    /**
     * Get idBoutique
     *
     * @return integer
     */
    public function getIdBoutique()
    {
        return $this->idBoutique;
    }

    /**
     * @param int $idBoutique
     */
    public function setIdBoutique($idBoutique)
    {
        $this->idBoutique = $idBoutique;
    }





    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Boutique
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Boutique
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
     * Set position
     *
     * @param string $position
     *
     * @return Boutique
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * @param \DateTime $datecreation
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;
    }

    /**
     * @return \DateTime
     */
    public function getDateexpiration()
    {
        return $this->dateexpiration;
    }

    /**
     * @param \DateTime $dateexpiration
     */
    public function setDateexpiration($dateexpiration)
    {
        $this->dateexpiration = $dateexpiration;
    }

}
