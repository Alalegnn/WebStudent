<?php

namespace EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EtudiantBundle\Entity\Etudiant;
use EtudiantBundle\Entity\Stage;
use EtudiantBundle\Form\EtudiantType;

class EtudiantController extends Controller
{
    public function accueilAction()
	{
		//return new Response("");
		return $this->render('EtudiantBundle:Etudiant:accueil.html.twig');
	}

	public function ajouterAction(Request $request)
	{
		$unEtudiant = new Etudiant();
		$form = $this->get('form.factory')->create(EtudiantType::class, $unEtudiant);
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
		{
			$em = $this->getDoctrine()->GetManager();
			$em->persist($etudiant);
			$em->flush();
		}
		return $this->render('EtudiantBundle:Etudiant:ajouter.html.twig', array('form' => $form->createView()));

		/*$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Section');

		$section = $repository->findOneByLibelle('BTS Services Informatiques aux Organisations');

        $repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Promotion');

		$promotion = $repository->findOneByLibelle('2015-2017');

 		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Niveau');

		$niveau = $repository->findOneByLibelle('2ème année');

		if($section === null)
		{
			throw $this->createNotFoundException('Section[id='.$id.'] inexistant.');
		}

		if($promotion === null)
		{
			throw $this->createNotFoundException('Promotion[id='.$id.'] inexistant.');
		}

		if($niveau === null)
		{
			throw $this->createNotFoundException('Niveau[id='.$id.'] inexistant.');
		}

		$etudiant = new Etudiant();
		$etudiant->setNom('Boyd');
		$etudiant->setPrenom('Usain');
		$etudiant->setAdrMail('usain.boyd@gmail.com');
		$etudiant->setVille('Vire');

		$stage = new Stage();
		$stage->setDateDebut('15/05/2017');
		$stage->setNbSemaines(5);
		$stage->setObjet('Stage de première année en développement informatique de 5 semaines');
		$stage->setEtudiant($etudiant);

		$etudiant->addStage($stage);

		$etudiant->setSection($section);

		$etudiant->setPromotion($promotion);

		$etudiant->setNiveau($niveau);

		$em = $this->getDoctrine()->getManager();

		$em->persist($etudiant);

		$em->flush();

		return $this->render('EtudiantBundle:Etudiant:consulter.html.twig', array('pEtudiant' => $etudiant));*/
	}

	public function modifierAction()
	{
		//return new Response("Page permettant de modifier un étudiant");
		return $this->render('EtudiantBundle:Etudiant:modifier.html.twig');
	}

	public function listerAction()
	{
    $repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Etudiant');

		$etudiant = $repository->findAll();
		//return new Response("Page permettant de lister les étudiants");
		return $this->render('EtudiantBundle:Etudiant:lister.html.twig', array('Etudiant' => $etudiant));
	}

	public function rechercherAction()
	{
		//return new Response("Page permettant de rechercher un étudiant");
		return $this->render('EtudiantBundle:Etudiant:rechercher.html.twig');
	}

	public function consulterAction($id)
	{
		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Etudiant');

		$etudiant = $repository->find($id);

		if($etudiant === null)
		{
			throw $this->createNotFoundException('Etudiant[id='.$id.'] inexistant.');
		}

		return $this->render('EtudiantBundle:Etudiant:consulter.html.twig',array('pEtudiant' => $etudiant));
	}

    public function listerParSectionAction($id)
	{
		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Section');

		$section = $repository->find($id);

		$lesEtudiants = $section->getEtudiants();

		if($section === null)
		{
			throw $this->createNotFoundException('Section[id='.$id.'] inexistant.');
		}

		return $this->render('EtudiantBundle:Etudiant:listerParSection.html.twig', array('section' => $section));
	}

	public function listerParPromoEnCoursAction($id)
	{
		$repository = $this->getDoctrine()
		           ->getManager()
				   ->getRepository('EtudiantBundle:Promotion');

		$promotion = $repository->repos['promotion']->findBy(array('libelle'));
    }
}
