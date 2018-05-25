<?php

namespace EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EtudiantBundle\Entity\Niveau;
use EtudiantBundle\Entity\Etudiant;

class NiveauController extends Controller
{	
	public function ajouterAction(){
		$niveau = new Niveau();;
		$niveau->setLibelle('1ère année');
	
		$etudiant = new Etudiant();
		$etudiant->setNom('Boyd');
		$etudiant->setPrenom('Game');
		$etudiant->setAdrMail('game.boyd@gmail.com');
		$etudiant->setVille('Caen ');
		$etudiant->setNiveau($niveau);
		
		$niveau->addEtudiant($etudiant);
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($niveau);
		$em->flush();
		
		return $this->render('EtudiantBundle:Niveau:consulter.html.twig', array('niveau' => $niveau));
	}
	
	public function consulterAction($id)
	{
		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Niveau');
	    
		$niveau = $repository->find($id);
		
		$lesEtudiants = $niveau->getEtudiants();
		
		foreach($lesEtudiants as $unEtudiant)
		{
			echo $unEtudiant->getNom().'<BR>';
		}
		
		if($niveau === null)
		{
			throw $this->createNotFoundException('Niveau[id='.$id.'] inexistant.');
		}
		
		return $this->render('EtudiantBundle:Niveau:consulter.html.twig', array('niveau' => $niveau));
	}
}