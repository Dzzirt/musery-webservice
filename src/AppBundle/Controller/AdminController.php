<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{

    /**
     * @Route(path="/admin", name="get_admin_page")
     */
    public function getAdminPage()
    {
        return $this->render('default/admin.html.twig');
    }
}