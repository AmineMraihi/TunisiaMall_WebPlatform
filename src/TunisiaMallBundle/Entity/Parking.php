<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parking
 *
 * @ORM\Table(name="parking")
 * @ORM\Entity
 */
class Parking
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_parking", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParking;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_parking", type="string", length=30, nullable=false)
     */
    private $nomParking;

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
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="TunisiaMallBundle\Entity\ReservationPP", mappedBy="id_parking")
     */
    private $reservation;

    /**
     * Get idParking
     *
     * @return integer
     */
    public function getIdParking()
    {
        return $this->idParking;
    }

    /**
     * Set nomParking
     *
     * @param string $nomParking
     *
     * @return Parking
     */
    public function setNomParking($nomParking)
    {
        $this->nomParking = $nomParking;

        return $this;
    }

    /**
     * Get nomParking
     *
     * @return string
     */
    public function getNomParking()
    {
        return $this->nomParking;
    }

    /**
     * Set nbPlaceTotal
     *
     * @param integer $nbPlaceTotal
     *
     * @return Parking
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
     * @return Parking
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
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param mixed $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }


}
