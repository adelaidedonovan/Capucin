<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
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
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string")
     */
    private $villeEntreprise;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *      min = 3,
     *      max = 5,
     *      minMessage = "Votre Code postal doit contenir au moins 3 chiffre ex: '972'",
     *      maxMessage = "Votre Code postal doit contenir au maximum 5 chiffre ex: '77000' "
     * )
     */
    private $cpEntreprise;

    /**
     * @ORM\Column(type="string")
     */
    private $adressseEntreprise;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email(
     *     message = "Votre adresse mail '{{ value }}' n'est pas un mail valide.",
     *     checkMX = true
     * )
     */
    private $mailEntreprise;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *      min = 9,
     *      max = 10,
     *      minMessage = "Votre numéro de téléphone doit contenir 10 chiffre",
     *      maxMessage = "Votre numéro de téléphone doit contenir 10 chiffre"
     * )
     */
    private $telEntreprise;

    /**
     * @ORM\Column(type="string")
     */
    private $activiteEntreprise;

    /**
     * @return mixed
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * @param mixed $nomEntreprise
     */
    public function setNomEntreprise($nomEntreprise): void
    {
        $this->nomEntreprise = $nomEntreprise;
    }

    /**
     * @return mixed
     */
    public function getVilleEntreprise()
    {
        return $this->villeEntreprise;
    }

    /**
     * @param mixed $villeEntreprise
     */
    public function setVilleEntreprise($villeEntreprise): void
    {
        $this->villeEntreprise = $villeEntreprise;
    }

    /**
     * @return mixed
     */
    public function getCpEntreprise()
    {
        return $this->cpEntreprise;
    }

    /**
     * @param mixed $cpEntreprise
     */
    public function setCpEntreprise($cpEntreprise): void
    {
        $this->cpEntreprise = $cpEntreprise;
    }

    /**
     * @return mixed
     */
    public function getAdressseEntreprise()
    {
        return $this->adressseEntreprise;
    }

    /**
     * @param mixed $adressseEntreprise
     */
    public function setAdressseEntreprise($adressseEntreprise): void
    {
        $this->adressseEntreprise = $adressseEntreprise;
    }

    /**
     * @return mixed
     */
    public function getMailEntreprise()
    {
        return $this->mailEntreprise;
    }

    /**
     * @param mixed $mailEntreprise
     */
    public function setMailEntreprise($mailEntreprise): void
    {
        $this->mailEntreprise = $mailEntreprise;
    }

    /**
     * @return mixed
     */
    public function getTelEntreprise()
    {
        return $this->telEntreprise;
    }

    /**
     * @param mixed $telEntreprise
     */
    public function setTelEntreprise($telEntreprise): void
    {
        $this->telEntreprise = $telEntreprise;
    }

    /**
     * @return mixed
     */
    public function getActiviteEntreprise()
    {
        return $this->activiteEntreprise;
    }

    /**
     * @param mixed $activiteEntreprise
     */
    public function setActiviteEntreprise($activiteEntreprise): void
    {
        $this->activiteEntreprise = $activiteEntreprise;
    }



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tuteur", mappedBy="entreprise")
     */
    private $tuteurs;

    public function __construct()
    {
        $this->tuteurs = new ArrayCollection();
    }
    /**
     * @return Collection|Tuteur[]
     */

    public function getTuteurs()
    {
        return $this->tuteurs;
    }


}