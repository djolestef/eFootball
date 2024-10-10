<?php

namespace App\Controller;

use App\Services\Company\CompanyService;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CompanyController
{
    /** @var CompanyService */
    protected $companyService;

    public function __construct(CompanyService  $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * @Route("/company/{id}", requirements={"id" = "\d+"}, name="get_company", options={"expose"=true})
     *
     * @param Request $request
     * @param         $id
     *
     * @throws NonUniqueResultException
     */
    public function getCompanyByIdAction(Request $request, $id)
    {
        $company = $this->companyService->getCompanyById($id);
        if (empty($company)) {
            throw new NotFoundHttpException('Can not find company with given id');
        }

        dd($company);
    }
}
