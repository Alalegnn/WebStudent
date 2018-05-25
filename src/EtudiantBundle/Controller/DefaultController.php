<?php

namespace EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
	{
		return $this->render('EtudiantBundle:Etudiant:accueil.html.twig');
	}
}
