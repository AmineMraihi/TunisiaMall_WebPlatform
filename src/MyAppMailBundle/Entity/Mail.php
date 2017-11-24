<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/11/2017
 * Time: 19:47
 */

namespace MyAppMailBundle\Entity;


class Mail
{
private $email;
private $text;
private $nom;

    /**
     * Mail constructor.
     * @param $email
     * @param $text
     * @param $nom
     */
    public function __construct($email, $text, $nom)
    {
        $this->email = $email;
        $this->text = $text;
        $this->nom = $nom;
    }
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }


}