<?php


namespace App\Controller\admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminReportsController
 * @package App\Controller
 * @Route("/{_locale}/admin/reports")
 */
class AdminReportsController extends AbstractController
{

    /**
     * @Route("", name="admin.reports.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('admin/admin_reports/admin_reports_index.html.twig', [
            'current_page' => 'admin_reports'
        ]);
    }

}