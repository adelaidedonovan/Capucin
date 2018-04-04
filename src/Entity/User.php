<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $nomUser;
    /**
     * @ORM\Column(type="string")
     */
    private $prenomUser;
    /**
     * @ORM\Column(type="string")
     */
    private $anneeScolaire;
    /**
     * @ORM\Column(type="string")
     */
    private $login;
    /**
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @ORM\Column(type="string")
     */
    private $role;
    /**
     * @ORM\Column(type="string")
     */
    private $classeUser;

    /**
     * @return mixed
     */
    public function getNomUser()
    {
        return $this->nomUser;
    }

    /**
     * @param mixed $nomUser
     */
    public function setNomUser($nomUser): void
    {
        $this->nomUser = $nomUser;
    }

    /**
     * @return mixed
     */
    public function getPrenomUser()
    {
        return $this->prenomUser;
    }

    /**
     * @param mixed $prenomUser
     */
    public function setPrenomUser($prenomUser): void
    {
        $this->prenomUser = $prenomUser;
    }

    /**
     * @return mixed
     */
    public function getAnneeScolaire()
    {
        return $this->anneeScolaire;
    }

    /**
     * @param mixed $anneeScolaire
     */
    public function setAnneeScolaire($anneeScolaire): void
    {
        $this->anneeScolaire = $anneeScolaire;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getClasseUser()
    {
        return $this->classeUser;
    }

    /**
     * @param mixed $classeUser
     */
    public function setClasseUser($classeUser): void
    {
        $this->classeUser = $classeUser;
    }



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="user")
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
}
