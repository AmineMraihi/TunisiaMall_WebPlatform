<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JardinEnfant
 *
 * @ORM\Table(name="jardin_enfant", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class JardinEnfant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_jardin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJardin;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_place_total", type="integer", nullable=false)
     */
    private $nbPlaceTotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_place_libre", type="integer", nullable=false)
     */
    private $nbPlaceLibre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reservation", type="date", nullable=false)
     */
    private $dateReservation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;



    /**
     * Get idJardin
     *
     * @return integer
     */
    public function getIdJardin()
    {
        return $this->idJardin;
    }

    /**
     * Set nbPlaceTotal
     *
     * @param integer $nbPlaceTotal
     *
     * @return JardinEnfant
     */
    public function setNbPlaceTotal($nbPlaceTotal)
    {
        $this->nbPlaceTotal = $nbPlaceTotal;

        return $this;
    }

    /**
     * Get nbPlaceTotal
     *
     * @return integer
     */
    public function getNbPlaceTotal()
    {
        return $this->nbPlaceTotal;
    }

    /**
     * Set nbPlaceLibre
     *
     * @param integer $nbPlaceLibre
     *
     * @return JardinEnfant
     */
    public function setNbPlaceLibre($nbPlaceLibre)
    {
        $this->nbPlaceLibre = $nbPlaceLibre;

        return $this;
    }

    /**
     * Get nbPlaceLibre
     *
     * @return integer
     */
    public function getNbPlaceLibre()
    {
        return $this->nbPlaceLibre;
    }

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return JardinEnfant
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return JardinEnfant
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
