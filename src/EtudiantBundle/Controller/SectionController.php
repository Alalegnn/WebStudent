<?php

namespace EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EtudiantBundle\Entity\Section;
use EtudiantBundle\Entity\Etudiant;

class SectionController extends Controller
{
/*public function indexAction()
	{
		return $this->render('EtudiantBundle:Default:index.html.twig');
	}*/
	
	public function ajouterAction(){
		$section = new Section();
		$section->setCode('PMEI');
		$section->setLibelle('BTS PME-PMI');
		$section->setNbEtudiants(95);
		
		$etudiant = new Etudiant();
		$etudiant->setNom('Boyd');
		$etudiant->setPrenom('Susane');
		$etudiant->setAdrMail('susanne.boyd@gmail.com');
		$etudiant->setVille('Dublin');
		$etudiant->setSection($section);
		
		$section->addEtudiant($etudiant);
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($section);
		$em->flush();
		
		return $this->render('EtudiantBundle:Section:consulter.html.twig', array('section' => $section));
	}
	
	public function consulterAction($id)
	{
		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Section');
	    
		$section = $repository->find($id);
		
		$lesEtudiants = $section->getEtudiants();
		
		foreach($lesEtudiants as $unEtudiant)
		{
			echo $unEtudiant->getNom().'<BR>';
		}
		
		if($section === null)
		{
			throw $this->createNotFoundException('Section[id='.$id.'] inexistant.');
		}
		
		return $this->render('EtudiantBundle:Section:consulter.html.twig', array('section' => $section));
	}
	
}
