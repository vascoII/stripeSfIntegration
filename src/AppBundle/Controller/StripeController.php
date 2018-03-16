<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StripeController extends Controller
{
    /**
     * @var string
     */
    private $publishableKey;

    public function __construct()
    {
        $this->publishableKey = $this->container/*->getParameter('publishable_key');*/;
    }

    /**
     * @Route("/test", name="test")
     */
    public function registerAction()
    {
        echo '<pre>';
        print_r($this->container); // "secret_password"
        echo '</pre>';
    }
    /**
     * @Route("/stripe", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if ($request->getRealMethod() === 'POST') {
            var_dump($request->request->all()); die('Pan : on est mort');
        }

        return $this->render('stripe/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
