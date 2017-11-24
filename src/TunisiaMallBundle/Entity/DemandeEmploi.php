<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeEmploi
 *
 * @ORM\Table(name="demande_emploi", indexes={@ORM\Index(name="id_user_fk", columns={"id_user_fk"}), @ORM\Index(name="id_offre_fk", columns={"id_offre_fk"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="TunisiaMallBundle\Repository\StatRepository")
 */
class DemandeEmploi
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_demande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_emp", type="string", length=50, nullable=false)
     */
    private $nomEmp;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_emp", type="string", length=50, nullable=false)
     */
    private $prenomEmp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=50, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=50, nullable=true)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel", type="string", length=50, nullable=true)
     */
    private $numTel;

    /**
     * @var string
     *
     * @ORM\Column(name="qualification", type="string", length=50, nullable=true)
     */
    private $qualification;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience", type="integer", nullable=true)
     */
    private $experience;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user_fk", type="integer", nullable=false)
     *
     */
    private $IdUserFk;

    /**
     * @var \OffreEmploi
     *
     * @ORM\ManyToOne(targetEntity="OffreEmploi")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_offre_fk", referencedColumnName="id_offre")
     * })
     */
    private $Offre;

    /**
     * DemandeEmploi constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return int
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param int $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    /**
     * @return string
     */
    public function getNomEmp()
    {
        return $this->nomEmp;
    }

    /**
     * @param string $nomEmp
     */
    public function setNomEmp($nomEmp)
    {
        $this->nomEmp = $nomEmp;
    }

    /**
     * @return string
     */
    public function getPrenomEmp()
    {
        return $this->prenomEmp;
    }

    /**
     * @param string $prenomEmp
     */
    public function setPrenomEmp($prenomEmp)
    {
        $this->prenomEmp = $prenomEmp;
    }

    /**
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param \DateTime $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @param string $numTel
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
    }

    /**
     * @return string
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * @param string $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }

    /**
     * @return int
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param int $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * @return int
     */
    public function getIdUserFk()
    {
        return $this->IdUserFk;
    }

    /**
     * @param int $IdUserFk
     */
    public function setIdUserFk($IdUserFk)
    {
        $this->IdUserFk = $IdUserFk;
    }



    /**
     * @return \OffreEmploi
     */
    public function getOffre()
    {
        return $this->Offre;
    }

    /**
     * @param \OffreEmploi $Offre
     */
    public function setOffre($Offre)
    {
        $this->Offre = $Offre;
    }







}
