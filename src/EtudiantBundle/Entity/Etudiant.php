<?php

namespace EtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="EtudiantBundle\Repository\EtudiantRepository")
 */
class Etudiant
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
     * @ORM\Column(name="nom", type="string", length=40)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=40)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaiss", type="date", nullable=true)
     */
    private $dateNaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="adrMail", type="string", length=60, nullable=true)
     */
    private $adrMail;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=14, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=60, nullable=true)
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="coPos", type="string", length=5, nullable=true)
     */
    private $coPos;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=60, nullable=true)
     */
    private $ville;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Etudiant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaiss
     *
     * @param \DateTime $dateNaiss
     *
     * @return Etudiant
     */
    public function setDateNaiss($dateNaiss)
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    /**
     * Get dateNaiss
     *
     * @return \DateTime
     */
    public function getDateNaiss()
    {
        return $this->dateNaiss;
    }

    /**
     * Set adrMail
     *
     * @param string $adrMail
     *
     * @return Etudiant
     */
    public function setAdrMail($adrMail)
    {
        $this->adrMail = $adrMail;

        return $this;
    }

    /**
     * Get adrMail
     *
     * @return string
     */
    public function getAdrMail()
    {
        return $this->adrMail;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Etudiant
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set rue
     *
     * @param string $rue
     *
     * @return Etudiant
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set coPos
     *
     * @param string $coPos
     *
     * @return Etudiant
     */
    public function setCoPos($coPos)
    {
        $this->coPos = $coPos;

        return $this;
    }

    /**
     * Get coPos
     *
     * @return string
     */
    public function getCoPos()
    {
        return $this->coPos;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Etudiant
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }
	
	/**
     * @ORM\ManyToOne(targetEntity="EtudiantBundle\Entity\Section", inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=true)
     */
	private $section;	

	
	/**
     * @ORM\ManyToOne(targetEntity="EtudiantBundle\Entity\Promotion", inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=true)
     */
	private $promotion;

	
	/**
     * @ORM\ManyToOne(targetEntity="EtudiantBundle\Entity\Niveau", inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=true)
     */
	private $niveau;

    /**
     * Set section
     *
     * @param \EtudiantBundle\Entity\Section $section
     *
     * @return Etudiant
     */
    public function setSection(\EtudiantBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \EtudiantBundle\Entity\Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set promotion
     *
     * @param \EtudiantBundle\Entity\Promotion $promotion
     *
     * @return Etudiant
     */
    public function setPromotion(\EtudiantBundle\Entity\Promotion $promotion = null)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return \EtudiantBundle\Entity\Promotion
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set niveau
     *
     * @param \EtudiantBundle\Entity\Niveau $niveau
     *
     * @return Etudiant
     */
    public function setNiveau(\EtudiantBundle\Entity\Niveau $niveau = null)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \EtudiantBundle\Entity\Niveau
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
	
	/**
	* @ORM\OneToMany(targetEntity="EtudiantBundle\Entity\Stage", mappedBy="etudiant", cascade={"persist"})
	* @ORM\JoinColumn(nullable=false)
	*/
	private $stages;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stage
     *
     * @param \EtudiantBundle\Entity\Stage $stage
     *
     * @return Etudiant
     */
    public function addStage(\EtudiantBundle\Entity\Stage $stage)
    {
        $this->stages[] = $stage;

        return $this;
    }

    /**
     * Remove stage
     *
     * @param \EtudiantBundle\Entity\Stage $stage
     */
    public function removeStage(\EtudiantBundle\Entity\Stage $stage)
    {
        $this->stages->removeElement($stage);
    }

    /**
     * Get stages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStages()
    {
        return $this->stages;
    }
}
