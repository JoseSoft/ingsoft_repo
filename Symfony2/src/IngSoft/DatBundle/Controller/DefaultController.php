<?php

namespace IngSoft\DatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    
    public function ayudaAction()
    {
        return new Response('Ayuda');
    }
  
    public function inicioAction()
    {
        return $this->render('IngSoftDatBundle:Default:inicio.html.twig');
    }
    
    public function foroAction()
    {
        return $this->render('IngSoftDatBundle:Default:foro.html.twig');
    }
    
    public function listadosolicitudesAction()
    {
        return $this->render('IngSoftDatBundle:Default:listadosolicitudes.html.twig');
    }
    
    public function listadoprestadoresAction()
    {
        return $this->render('IngSoftDatBundle:Default:prestadores.html.twig');
    }
    
    public function listadoproyectosAction()
    {
        return $this->render('IngSoftDatBundle:Default:listadoproyectos.html.twig');
    }
    
    public function listadoclientesAction()
    {
        return $this->render('IngSoftDatBundle:Default:listadoclientes.html.twig');
    }
}
   