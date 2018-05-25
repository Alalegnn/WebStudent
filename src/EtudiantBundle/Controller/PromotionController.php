<?php

namespace EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EtudiantBundle\Entity\Promotion;
use EtudiantBundle\Entity\Etudiant;

class PromotionController extends Controller
{	
	public function ajouterAction(){
		$promotion = new Promotion();;
		$promotion->setLibelle('2014-2016');
	
		$etudiant = new Etudiant();
		$etudiant->setNom('Boyd');
		$etudiant->setPrenom('Allan');
		$etudiant->setAdrMail('allan.boyd@gmail.com');
		$etudiant->setVille('Landelle et coupigny');
		$etudiant->setPromotion($promotion);
		
		$promotion->addEtudiant($etudiant);
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($promotion);
		$em->flush();
		
		return $this->render('EtudiantBundle:Promotion:consulter.html.twig', array('promotion' => $promotion));
	}
	
	public function consulterAction($id)
	{
		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Promotion');
	    
		$promotion = $repository->find($id);
		
		$lesEtudiants = $promotion->getEtudiants();
		
		foreach($lesEtudiants as $unEtudiant)
		{
			echo $unEtudiant->getNom().'<BR>';
		}
		
		if($promotion === null)
		{
			throw $this->createNotFoundException('Promotion[id='.$id.'] inexistant.');
		}
		
		return $this->render('EtudiantBundle:Promotion:consulter.html.twig', array('promotion' => $promotion));
	}
}
