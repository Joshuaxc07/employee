<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AdminBundle:Default:index.html.twig', array('name' => $name));
    }
    public function createAction(Request $request)
    {

        if($request->getMethod() == "POST")
        {

            $params   = $request->request->all();
            $emp_name = $params["empName"];

            $employee = new Employee();
            $employee->setEmployeeName($emp_name);
            $em = $this->getDoctrine()->getManager();
            $em->persist($employee);
            // actually executes the queries (i.e. the INSERT query)
            $em->flush();

            return new JsonResponse($employee);
            return new Response('Saved new product with id ' . $employee->getEmployeeId());
        }
        return $this->render('AdminBundle:Default:index.html.twig');

    }
    public function deleteEmployeeAction(Request $request, $employee_id)
    {
        if($request->getMethod() == "GET") {

            $em = $this->getDoctrine()->getEntityManager();

            $repository = $em->getRepository('AdminBundle:Employee');

            $employee_info = $repository->find($employee_id);

            $em->persist($employee_info);

            $em->remove($employee_info);

            $em->flush();

            return $this->render('AdminBundle:Default:index.html.twig');
        }
        return $this->render('AdminBundle:Default:index.html.twig');
    }
    public function showDataAction(Request $request)
    {
        $employee_info = $this->getDoctrine()->getRepository('AdminBundle:Employee')->findAll();
        if($request->getMethod() == "POST")
        {
        return $this->render('AdminBundle:Default:emp_table.html.twig', array('emp_info' =>$employee_info));
        }
        return $this->render('AdminBundle:Default:index.html.twig');
    }
}
