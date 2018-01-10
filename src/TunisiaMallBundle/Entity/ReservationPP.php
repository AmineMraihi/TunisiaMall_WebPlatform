<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 23/11/2017
 * Time: 20:14
 */

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="reservation_pp")
 * @ORM\Entity()
 */
class ReservationPP
{
    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservation;

    /**
     * @var \integer
     *
     * @ORM\Column(name="nb_voitures", type="integer", nullable=false)
     */
    private $nbvoitures;


    /**
     * @var \Date
     *
     * @ORM\Column(name="jour_heure", type="date", nullable=true)
     */
    private $jour_heure;

    /**
     * @var \Time
     *
     * @ORM\Column(name="heure", type="time", nullable=true)
     */
    private $heure;

    /**
     * Many Reservation have One Jardin.
     * @ORM\ManyToOne(targetEntity="Parking", inversedBy="reservation")
     * @ORM\JoinColumn(name="idparking", referencedColumnName="id_parking")
     */
    private $idparking;

    /**
     * @var \User
     * Many Reservation have One USER.
     * @ORM\ManyToOne(targetEntity="TunisiaMallBundle\Entity\User", inversedBy="reservationpp")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     */

    private $iduser;

    /**
     * @return mixed
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * @param mixed $idReservation
     */
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }

    /**
     * @return int
     */
    public function getNbvoitures()
    {
        return $this->nbvoitures;
    }

    /**
     * @param int $nbvoitures
     */
    public function setNbvoitures($nbvoitures)
    {
        $this->nbvoitures = $nbvoitures;
    }

    /**
     * @return \Date
     */
    public function getJourHeure()
    {
        return $this->jour_heure;
    }

    /**
     * @param \Date $jour_heure
     */
    public function setJourHeure($jour_heure)
    {
        $this->jour_heure = $jour_heure;
    }

    /**
     * @return \Time
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param \Time $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getIdparking()
    {
        return $this->idparking;
    }

    /**
     * @param mixed $idparking
     */
    public function setIdparking($idparking)
    {
        $this->idparking = $idparking;
    }

    /**
     * @return \User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \User $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }


}