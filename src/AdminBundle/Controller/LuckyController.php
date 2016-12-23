<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/23/2016
 * Time: 1:55 PM
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    public function indexAction()
    {
        $number = mt_rand(0,100);

        return $this->render('AdminBundle:Lucky:number.html.twig', array('number' => $number));
    }
}