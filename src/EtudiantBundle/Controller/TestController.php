<?php

namespace EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    public function ajouterPromotionAction()
	{
		$promotion = new Promotion();
		$promotion->setLibelle('Promotion1');
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($promotion);
		$em->flush();
		return $this->render('EtudiantBundle:Promotion:consulter.html.twig');
	}
	
	public function ajouterNiveauAction()
	{
		$Niveau = new Niveau();
		$Niveau->setLibelle('Niveau1');
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($Niveau);
		$em->flush();
		return $this->render('EtudiantBundle:Niveau:consulter.html.twig');
	}
	
	public function ajouterBaccalaureatAction()
	{
		$Baccalaureat = new Baccalaureat();
		$Baccalaureat->setCode('Bac1');
		$Baccalaureat->setLibelle('Baccalaureat1');
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($Baccalaureat);
		$em->flush();
		return $this->render('EtudiantBundle:Baccalaureat:consulter.html.twig');
	}
}