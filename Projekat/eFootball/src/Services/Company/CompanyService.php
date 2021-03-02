<?php

namespace App\Services\Company;

use App\Repository\CompanyRepository;

class CompanyService
{
    /** @var CompanyRepository */
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @param $id
     *
     * @return \App\Entity\Company|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getCompanyById($id)
    {
        return $this->companyRepository->findOneCompanyById($id);
    }
}