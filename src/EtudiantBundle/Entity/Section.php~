<?php

namespace EtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table(name="section")
 * @ORM\Entity(repositoryClass="EtudiantBundle\Repository\SectionRepository")
 */
class Section
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=8, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=60)
     */
    private $libelle;

    
	/**
     * @var int
     *
     * @ORM\Column(name="nbEtudiants", type="integer", nullable=true)
     */
	private $nbEtudiants;
    /**
     * Get id
     *
     * @return int
     */
	 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Section
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Section
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
	
	/**
     * Set nbEtudiants
     *
     * @param int $nbEtudiants
     *
     * @return Section
     */
	public function setNbEtudiants($nbEtudiants)
    {
        $this->nbEtudiants = $nbEtudiants;

        return $this;
    }

    /**
     * Get nbEtudiants
     *
     * @return int
     */
    public function getNbEtudiants()
    {
        return $this->NbEtudiants;
    }
	
	/**
	* @ORM\OneToMany(targetEntity="EtudiantBundle\Entity\Etudiant", mappedBy="section", cascade={"persist"})
	* @ORM\JoinColumn(nullable=false)
	*/
	private $etudiants;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etudiants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add etudiant
     *
     * @param \EtudiantBundle\Entity\Etudiant $etudiant
     *
     * @return Section
     */
    public function addEtudiant(\EtudiantBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiants[] = $etudiant;

        return $this;
    }

    /**
     * Remove etudiant
     *
     * @param \EtudiantBundle\Entity\Etudiant $etudiant
     */
    public function removeEtudiant(\EtudiantBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiants->removeElement($etudiant);
    }

    /**
     * Get etudiants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }
}
