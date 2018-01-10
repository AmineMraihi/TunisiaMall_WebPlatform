<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/*
 *@ORM\Entity
 */

/**
 * OffreEmploi
 *
 * @ORM\Table(name="offre_emploi", indexes={@ORM\Index(name="id_boutique", columns={"id_boutique_fk"}), @ORM\Index(name="id_user_fk", columns={"id_user_fk"})})
 * @ORM\Entity
 */
class OffreEmploi
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user_fk", type="integer", nullable=false)
     *
     */
    private $IdUserFk;

    /**
     * @var Boutique
     * @ORM\ManyToOne(targetEntity="Boutique")
     * @ORM\JoinColumn(name="id_boutique_fk",referencedColumnName="id_boutique")
     */
    private $Boutique;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=50, nullable=true)
     */
    private $poste;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=50, nullable=true)
     */
    private $specialite;

    /**
     * @var float
     *
     * @ORM\Column(name="salaire", type="float", precision=10, scale=0, nullable=true)
     */
    private $salaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_demande", type="integer", nullable=true)
     */
    private $nbrDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expiration", type="date", nullable=true)
     */
    private $dateExpiration;

    /**
     * OffreEmploi constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return int
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * @param int $idOffre
     */
    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;
    }

    /**
     * @return int
     */
    public function getIdUserFk()
    {
        return $this->IdUserFk;
    }

    /**
     * @param $IdUserFk
     */
    public function setIdUserFk($IdUserFk)
    {
        $this->IdUserFk = $IdUserFk;
    }



    /**
     * @return Boutique
     */
    public function getBoutique()
    {
        return $this->Boutique;
    }

    /**
     * @param Boutique $Boutique
     */
    public function setBoutique($Boutique)
    {
        $this->Boutique = $Boutique;
    }

    /**
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * @param string $poste
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }

    /**
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param string $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * @return float
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * @param float $salaire
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    /**
     * @return int
     */
    public function getNbrDemande()
    {
        return $this->nbrDemande;
    }

    /**
     * @param int $nbrDemande
     */
    public function setNbrDemande($nbrDemande)
    {
        $this->nbrDemande = $nbrDemande;
    }

    /**
     * @return \DateTime
     */
    public function getDateExpiration()
    {
        return $this->dateExpiration;
    }

    /**
     * @param \DateTime $dateExpiration
     */
    public function setDateExpiration($dateExpiration)
    {
        $this->dateExpiration = $dateExpiration;
    }




}
