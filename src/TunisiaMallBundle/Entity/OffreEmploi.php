<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $idUserFk;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_boutique_fk", type="integer", nullable=false)
     */
    private $idBoutiqueFk;

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
     * @ORM\Column(name="nbr_demandÃ©", type="integer", nullable=true)
     */
    private $nbrDemandã©;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expiration", type="date", nullable=true)
     */
    private $dateExpiration;



    /**
     * Get idOffre
     *
     * @return integer
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set idUserFk
     *
     * @param integer $idUserFk
     *
     * @return OffreEmploi
     */
    public function setIdUserFk($idUserFk)
    {
        $this->idUserFk = $idUserFk;

        return $this;
    }

    /**
     * Get idUserFk
     *
     * @return integer
     */
    public function getIdUserFk()
    {
        return $this->idUserFk;
    }

    /**
     * Set idBoutiqueFk
     *
     * @param integer $idBoutiqueFk
     *
     * @return OffreEmploi
     */
    public function setIdBoutiqueFk($idBoutiqueFk)
    {
        $this->idBoutiqueFk = $idBoutiqueFk;

        return $this;
    }

    /**
     * Get idBoutiqueFk
     *
     * @return integer
     */
    public function getIdBoutiqueFk()
    {
        return $this->idBoutiqueFk;
    }

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return OffreEmploi
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set specialite
     *
     * @param string $specialite
     *
     * @return OffreEmploi
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set salaire
     *
     * @param float $salaire
     *
     * @return OffreEmploi
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return float
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set nbrDemandã©
     *
     * @param integer $nbrDemandã©
     *
     * @return OffreEmploi
     */
    public function setNbrDemandã©($nbrDemandã©)
    {
        $this->nbrDemandã© = $nbrDemandã©;

        return $this;
    }

    /**
     * Get nbrDemandã©
     *
     * @return integer
     */
    public function getNbrDemandã©()
    {
        return $this->nbrDemandã©;
    }

    /**
     * Set dateExpiration
     *
     * @param \DateTime $dateExpiration
     *
     * @return OffreEmploi
     */
    public function setDateExpiration($dateExpiration)
    {
        $this->dateExpiration = $dateExpiration;

        return $this;
    }

    /**
     * Get dateExpiration
     *
     * @return \DateTime
     */
    public function getDateExpiration()
    {
        return $this->dateExpiration;
    }
}
