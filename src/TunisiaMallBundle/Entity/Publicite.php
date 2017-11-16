<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publicite
 *
 * @ORM\Table(name="publicite", indexes={@ORM\Index(name="id_boutique", columns={"id_boutique"})})
 * @ORM\Entity
 */
class Publicite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pub", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPub;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="page", type="string", length=50, nullable=false)
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="blob", nullable=false)
     */
    private $path;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_boutique", type="integer", nullable=true)
     */
    private $idBoutique;



    /**
     * Get idPub
     *
     * @return integer
     */
    public function getIdPub()
    {
        return $this->idPub;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Publicite
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Publicite
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Publicite
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set page
     *
     * @param string $page
     *
     * @return Publicite
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Publicite
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set idBoutique
     *
     * @param integer $idBoutique
     *
     * @return Publicite
     */
    public function setIdBoutique($idBoutique)
    {
        $this->idBoutique = $idBoutique;

        return $this;
    }

    /**
     * Get idBoutique
     *
     * @return integer
     */
    public function getIdBoutique()
    {
        return $this->idBoutique;
    }
}
