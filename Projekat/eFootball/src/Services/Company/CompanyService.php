<?php

namespace App\Services\Company;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use Doctrine\ORM\NonUniqueResultException;

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
     * @return Company|null
     * @throws NonUniqueResultException
     */
    public function getCompanyById($id): ?Company
    {
        return $this->companyRepository->findOneCompanyById($id);
    }
}