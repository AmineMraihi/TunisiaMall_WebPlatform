<?php

namespace TunisiaMallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topic1
 *
 * @ORM\Table(name="topic1")
 * @ORM\Entity
 */
class Topic1
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_topic1", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTopic1;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50, nullable=false)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_topic", type="date", nullable=false)
     */
    private $dateTopic;

    /**
     * @var string
     *
     * @ORM\Column(name="login_user", type="string", length=50, nullable=false)
     */
    private $loginUser;



    /**
     * Get idTopic1
     *
     * @return integer
     */
    public function getIdTopic1()
    {
        return $this->idTopic1;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Topic1
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Topic1
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateTopic
     *
     * @param \DateTime $dateTopic
     *
     * @return Topic1
     */
    public function setDateTopic($dateTopic)
    {
        $this->dateTopic = $dateTopic;

        return $this;
    }

    /**
     * Get dateTopic
     *
     * @return \DateTime
     */
    public function getDateTopic()
    {
        return $this->dateTopic;
    }

    /**
     * Set loginUser
     *
     * @param string $loginUser
     *
     * @return Topic1
     */
    public function setLoginUser($loginUser)
    {
        $this->loginUser = $loginUser;

        return $this;
    }

    /**
     * Get loginUser
     *
     * @return string
     */
    public function getLoginUser()
    {
        return $this->loginUser;
    }
}
