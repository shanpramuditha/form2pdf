<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
//        $html = $this->renderView('default/index.html.twig', array(
//
//        ));
//
//        return new Response(
//            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
//            200,
//            array(
//                'Content-Type'          => 'application/pdf',
//                'Content-Disposition'   => 'attachment; filename="file.pdf"'
//            )
//        );

    }

    /**
     * @Route("/pdf",name="pdf")
     */
    public function pdfCreate(Request $request){
        $firstName = $request->get('firstName');
        $secondName = $request->get('lastName');
        $html = $this->renderView('default/pdf.html.twig', array(
            'firstName'=>$firstName,
            'secondName'=>$secondName
        ));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="pdfForm.pdf"'
            )
        );
    }
}
