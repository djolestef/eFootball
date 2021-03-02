<?php

namespace App\Services\Pitch;

use App\Entity\Company;
use App\Entity\Pitch;
use App\Repository\PitchRepository;
use App\Services\Company\CompanyService;
use phpDocumentor\Reflection\Type;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PitchService
{
    /** @var PitchRepository */
    protected $pitchRepository;

    /** @var CompanyService */
    protected $companyService;

    public function __construct(PitchRepository $pitchRepository, CompanyService  $companyService)
    {
        $this->pitchRepository = $pitchRepository;
        $this->companyService = $companyService;
    }

    /**
     * @param $id
     *
     * @return \App\Entity\Pitch|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getPitchById($id)
    {
        return $this->pitchRepository->findOnePitchById($id);
    }

    /**
     * @param $companyId
     *
     * @return \App\Entity\Pitch[]
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getPitchesByCompanyId($companyId)
    {
        /** @var Company $company */
        $company = $this->companyService->getCompanyById($companyId);
        if (empty($company)) {
            throw new NotFoundHttpException('Can not find company with given id');
        }

        return $company->getPitches();
    }

    /**
     * @param Company $company
     * @param         $dimension
     * @param         $type
     * @param         $price
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function createPitch(Company $company, $dimension, $type, $price)
    {
        $pitch = new Pitch();
        $pitch->setCompany($company);
        $pitch->setDimensions($dimension);
        $pitch->setType($type);
        $pitch->setPrice($price);

        $this->pitchRepository->save($pitch);
    }
}