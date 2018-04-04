<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TuteurRepository")
 */
class Tuteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }


    /**
     * @ORM\Column(type="string")
     */
    private $nomTuteur;
    /**
     * @ORM\Column(type="string")
     */
    private $prenomTuteur;
    /**
     * @ORM\Column(type="string")
     * @Assert\Email(
     *     message = "Votre adresse mail '{{ value }}' n'est pas un mail valide.",
     *     checkMX = true
     * )
     */

    private $mailTuteur;
    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = 9,
     *      max = 10,
     *      minMessage = "Votre numéro de téléphone doit contenir 10 chiffre",
     *      maxMessage = "Votre numéro de téléphone doit contenir 10 chiffre"
     * )
     */
    private $telTuteur;

    /**
     * @return mixed
     */
    public function getNomTuteur()
    {
        return $this->nomTuteur;
    }

    /**
     * @param mixed $nomTuteur
     */
    public function setNomTuteur($nomTuteur): void
    {
        $this->nomTuteur = $nomTuteur;
    }

    /**
     * @return mixed
     */
    public function getPrenomTuteur()
    {
        return $this->prenomTuteur;
    }

    /**
     * @param mixed $prenomTuteur
     */
    public function setPrenomTuteur($prenomTuteur): void
    {
        $this->prenomTuteur = $prenomTuteur;
    }

    /**
     * @return mixed
     */
    public function getMailTuteur()
    {
        return $this->mailTuteur;
    }

    /**
     * @param mixed $mailTuteur
     */
    public function setMailTuteur($mailTuteur): void
    {
        $this->mailTuteur = $mailTuteur;
    }




    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="tuteur")
     */
    private $stages;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
    }
    /**
     * @return Collection|Stage[]
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * @return mixed
     */
    public function getTelTuteur()
    {
        return $this->telTuteur;
    }

    /**
     * @param mixed $telTuteur
     */
    public function setTelTuteur($telTuteur): void
    {
        $this->telTuteur = $telTuteur;
    }


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="tuteurs")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $entreprise;

    public function getEntreprise()
    {
        return $this->entreprise;
    }

    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }



}






