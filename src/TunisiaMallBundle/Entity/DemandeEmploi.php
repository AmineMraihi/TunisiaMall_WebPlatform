<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeEmploi
 *
 * @ORM\Table(name="demande_emploi", indexes={@ORM\Index(name="id_user_fk", columns={"id_user_fk"}), @ORM\Index(name="id_offre_fk", columns={"id_offre_fk"})})
 * @ORM\Entity
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user_fk", referencedColumnName="id_user")
     * })
     */
    private $idUserFk;

    /**
     * @var \OffreEmploi
     *
     * @ORM\ManyToOne(targetEntity="OffreEmploi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offre_fk", referencedColumnName="id_offre")
     * })
     */
    private $idOffreFk;



    /**
     * Get idDemande
     *
     * @return integer
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * Set nomEmp
     *
     * @param string $nomEmp
     *
     * @return DemandeEmploi
     */
    public function setNomEmp($nomEmp)
    {
        $this->nomEmp = $nomEmp;

        return $this;
    }

    /**
     * Get nomEmp
     *
     * @return string
     */
    public function getNomEmp()
    {
        return $this->nomEmp;
    }

    /**
     * Set prenomEmp
     *
     * @param string $prenomEmp
     *
     * @return DemandeEmploi
     */
    public function setPrenomEmp($prenomEmp)
    {
        $this->prenomEmp = $prenomEmp;

        return $this;
    }

    /**
     * Get prenomEmp
     *
     * @return string
     */
    public function getPrenomEmp()
    {
        return $this->prenomEmp;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return DemandeEmploi
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return DemandeEmploi
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return DemandeEmploi
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return DemandeEmploi
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set numTel
     *
     * @param string $numTel
     *
     * @return DemandeEmploi
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * Get numTel
     *
     * @return string
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * Set qualification
     *
     * @param string $qualification
     *
     * @return DemandeEmploi
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;

        return $this;
    }

    /**
     * Get qualification
     *
     * @return string
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Set experience
     *
     * @param integer $experience
     *
     * @return DemandeEmploi
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return integer
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set idUserFk
     *
     * @param \TunisiaMallBundle\Entity\User $idUserFk
     *
     * @return DemandeEmploi
     */
    public function setIdUserFk(\TunisiaMallBundle\Entity\User $idUserFk = null)
    {
        $this->idUserFk = $idUserFk;

        return $this;
    }

    /**
     * Get idUserFk
     *
     * @return \TunisiaMallBundle\Entity\User
     */
    public function getIdUserFk()
    {
        return $this->idUserFk;
    }

    /**
     * Set idOffreFk
     *
     * @param \TunisiaMallBundle\Entity\OffreEmploi $idOffreFk
     *
     * @return DemandeEmploi
     */
    public function setIdOffreFk(\TunisiaMallBundle\Entity\OffreEmploi $idOffreFk = null)
    {
        $this->idOffreFk = $idOffreFk;

        return $this;
    }

    /**
     * Get idOffreFk
     *
     * @return \TunisiaMallBundle\Entity\OffreEmploi
     */
    public function getIdOffreFk()
    {
        return $this->idOffreFk;
    }
}
