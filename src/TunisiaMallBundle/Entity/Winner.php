<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Winner
 *
 * @ORM\Table(name="winner")
 * @ORM\Entity
 */
class Winner
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tab_winner", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTabWinner;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="winner_date", type="date", nullable=false)
     */
    private $winnerDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_winner", type="integer", nullable=false)
     */
    private $idWinner;



    /**
     * Get idTabWinner
     *
     * @return integer
     */
    public function getIdTabWinner()
    {
        return $this->idTabWinner;
    }

    /**
     * Set winnerDate
     *
     * @param \DateTime $winnerDate
     *
     * @return Winner
     */
    public function setWinnerDate($winnerDate)
    {
        $this->winnerDate = $winnerDate;

        return $this;
    }

    /**
     * Get winnerDate
     *
     * @return \DateTime
     */
    public function getWinnerDate()
    {
        return $this->winnerDate;
    }

    /**
     * Set idWinner
     *
     * @param integer $idWinner
     *
     * @return Winner
     */
    public function setIdWinner($idWinner)
    {
        $this->idWinner = $idWinner;

        return $this;
    }

    /**
     * Get idWinner
     *
     * @return integer
     */
    public function getIdWinner()
    {
        return $this->idWinner;
    }
}
