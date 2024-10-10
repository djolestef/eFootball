<?php


namespace App\Services\Reservation;


use App\Entity\Company;
use App\Entity\Reservation;
use App\Repository\ReservationRepository;
use App\Services\Company\CompanyService;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReservationService
{
    /** @var ReservationRepository */
    protected $reservationRepository;

    /** @var CompanyService */
    protected $companyService;

    public function __construct(ReservationRepository $reservationRepository, CompanyService  $companyService)
    {
        $this->reservationRepository = $reservationRepository;
        $this->companyService = $companyService;
    }

    /**
     * @param $id
     *
     * @return Reservation|null
     * @throws NonUniqueResultException
     */
    public function getReservationById($id): Reservation
    {
        return $this->reservationRepository->findOneReservationById($id);
    }

    /**
     * @param $companyId
     *
     * @return int|mixed|string
     * @throws NonUniqueResultException
     */
    public function getReservationsByCompanyId($companyId)
    {
        /** @var Company $company */
        $company = $this->companyService->getCompanyById($companyId);
        if (empty($company)) {
            throw new NotFoundHttpException('Can not find company with given id');
        }

        return $this->reservationRepository->findReservationsByCompanyId($companyId);
    }

}
