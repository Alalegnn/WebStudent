<?php

namespace EtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage")
 * @ORM\Entity(repositoryClass="EtudiantBundle\Repository\StageRepository")
 */
class Stage
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
     * @ORM\Column(name="dateDebut", type="string", length=15, nullable=true)
     */
    private $dateDebut;

    /**
     * @var int
     *
     * @ORM\Column(name="nbSemaines", type="integer", nullable=true)
     */
    private $nbSemaines;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=100, nullable=true)
     */
    private $objet;


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
     * Set dateDebut
     *
     * @param string $dateDebut
     *
     * @return Stage
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return string
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set nbSemaines
     *
     * @param integer $nbSemaines
     *
     * @return Stage
     */
    public function setNbSemaines($nbSemaines)
    {
        $this->nbSemaines = $nbSemaines;

        return $this;
    }

    /**
     * Get nbSemaines
     *
     * @return int
     */
    public function getNbSemaines()
    {
        return $this->nbSemaines;
    }

    /**
     * Set objet
     *
     * @param string $objet
     *
     * @return Stage
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }
	
	/**
     * @ORM\ManyToOne(targetEntity="EtudiantBundle\Entity\Entreprise")
     * @ORM\JoinColumn(nullable=true)
     */
	private $entreprise;

	/**
     * @ORM\ManyToOne(targetEntity="EtudiantBundle\Entity\Tuteur")
     * @ORM\JoinColumn(nullable=true)
     */
	private $tuteur;
	
	/**
     * @ORM\ManyToOne(targetEntity="EtudiantBundle\Entity\Etudiant", inversedBy="stages")
     * @ORM\JoinColumn(nullable=true)
     */
	private $etudiant;

    /**
     * Set entreprise
     *
     * @param \EtudiantBundle\Entity\Entreprise $entreprise
     *
     * @return Stage
     */
    public function setEntreprise(\EtudiantBundle\Entity\Entreprise $entreprise = null)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return \EtudiantBundle\Entity\Entreprise
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set tuteur
     *
     * @param \EtudiantBundle\Entity\Tuteur $tuteur
     *
     * @return Stage
     */
    public function setTuteur(\EtudiantBundle\Entity\Tuteur $tuteur = null)
    {
        $this->tuteur = $tuteur;

        return $this;
    }

    /**
     * Get tuteur
     *
     * @return \EtudiantBundle\Entity\Tuteur
     */
    public function getTuteur()
    {
        return $this->tuteur;
    }
	
	/**
	* @ORM\OneToMany(targetEntity="EtudiantBundle\Entity\Mission", mappedBy="stage", cascade={"persist"})
	* @ORM\JoinColumn(nullable=false)
	*/
	private $missions;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->missions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mission
     *
     * @param \EtudiantBundle\Entity\Mission $mission
     *
     * @return Stage
     */
    public function addMission(\EtudiantBundle\Entity\Mission $mission)
    {
        $this->missions[] = $mission;

        return $this;
    }

    /**
     * Remove mission
     *
     * @param \EtudiantBundle\Entity\Mission $mission
     */
    public function removeMission(\EtudiantBundle\Entity\Mission $mission)
    {
        $this->missions->removeElement($mission);
    }

    /**
     * Get missions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * Set etudiant
     *
     * @param \EtudiantBundle\Entity\Etudiant $etudiant
     *
     * @return Stage
     */
    public function setEtudiant(\EtudiantBundle\Entity\Etudiant $etudiant = null)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \EtudiantBundle\Entity\Etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }
}
