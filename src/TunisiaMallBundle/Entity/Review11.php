<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review7
 *
 * @ORM\Table(name="review11", indexes={@ORM\Index(name="id_produit", columns={"id_produit"})})
 * @ORM\Entity
 */
class Review11
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_review", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReview;

    /**
 * @var string
 *
 * @ORM\Column(name="email", type="string", length=50, nullable=false)
 */
    private $email;

    /**
     * @return int
     */

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     * })
     */

    private $idProduit;


    public function getAb()
    {
        return $this->ab;
    }

    /**
     * @param int $ab
     */
    public function setAb($ab)
    {
        $this->ab = $ab;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="ab",  type="string", length=250, nullable=false)
     */
    private $ab;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=250, nullable=false)
     */
    private $contenu;


    /**
     * @return int
     */
    public function getIdReview()
    {
        return $this->idReview;
    }

    /**
     * @param int $idReview
     */
    public function setIdReview($idReview)
    {
        $this->idReview = $idReview;
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
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }



    /**
     * Set idProduit
     *
     * @param \TunisiaMallBundle\Entity\Produit $idProduit
     *
     * @return Promotion
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get idProduit
     *
     * @return \TunisiaMallBundle\Entity\Produit
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }


}

