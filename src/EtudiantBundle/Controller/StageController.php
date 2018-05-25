<?php

namespace EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use EtudiantBundle\Entity\Stage;
use EtudiantBundle\Entity\Mission;

class StageController extends Controller
{	
	public function ajouterAction()
	{
		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Tuteur');
		
		$tuteur = $repository->findOneByNom('Rostand');

        $repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Entreprise');
				   
		$entreprise = $repository->findOneByNom('Google'); 
				   
		$repository = $this->getDoctrine()
		       ->getManager()
			   ->getRepository('EtudiantBundle:Etudiant');
		
		$etudiant = $repository->findOneByNom('Mercure');
		
		if($tuteur === null)
		{
			throw $this->createNotFoundException('Tuteur[id='.$id.'] inexistant.');
		}
		
		if($entreprise === null)
		{
			throw $this->createNotFoundException('Entreprise[id='.$id.'] inexistant.');
		}
		
		if($etudiant === null)
		{
			throw $this->createNotFoundException('Etudiant[id='.$id.'] inexistant.');
		}
		
		$stage = new Stage();
		$stage->setDateDebut('08/01/2018');
		$stage->setNbSemaines(7);
		$stage->setObjet('Stage en développement informatique de 7 semaines');
		
		$mission = new Mission();
		$mission->setLibelle('Créer la base de données');
		$mission->setDescription('Concevoir la base données qui permettre de stocker les données saisies sur le site');
		$mission->setStage($stage);
		
		$stage->addMission($mission);
		
		$stage->setTuteur($tuteur);
		
	    $stage->setEntreprise($entreprise);
		
		$stage->setEtudiant($etudiant);
		
		$em = $this->getDoctrine()->getManager();
		
		$em->persist($stage);
		
		$em->flush();
		
		return $this->render('EtudiantBundle:Stage:consulter.html.twig', array('pStage' => $stage));
	}

	
	public function consulterAction($id)
	{
		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Stage');
		
		$stage = $repository->find($id);
		
		if($stage === null)
		{
			throw $this->createNotFoundException('Stage[id='.$id.'] inexistant.');
		}
		
		return $this->render('EtudiantBundle:Stage:consulter.html.twig',array('pStage' => $stage));
	}
}	
