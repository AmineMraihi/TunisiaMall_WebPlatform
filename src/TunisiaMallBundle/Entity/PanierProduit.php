<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PanierProduit
 *
 * @ORM\Table(name="panier_produit")
 * @ORM\Entity
 */
class PanierProduit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idProduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_panier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPanier;



    /**
     * Set idProduit
     *
     * @param integer $idProduit
     *
     * @return PanierProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get idProduit
     *
     * @return integer
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * Set idPanier
     *
     * @param integer $idPanier
     *
     * @return PanierProduit
     */
    public function setIdPanier($idPanier)
    {
        $this->idPanier = $idPanier;

        return $this;
    }

    /**
     * Get idPanier
     *
     * @return integer
     */
    public function getIdPanier()
    {
        return $this->idPanier;
    }
}
