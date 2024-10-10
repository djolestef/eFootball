<?php

namespace App\Controller;

use App\Entity\Reservation;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\Reservation\ReservationService;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReservationController
{
    /** @var ReservationService */
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /**
     * @Route("/reservation/{id}", requirements={"id" = "\d+"}, name="get_reservation", options={"expose"=true})
     *
     * @param Request $request
     * @param         $id
     *
     * @return Reservation|null
     * @throws NonUniqueResultException
     */
    public function getReservationByIdAction(Request $request, $id): ?Reservation
    {
        return $this->reservationService->getreservationById($id);
    }

    /**
     * @Route("/reservations/company/{companyId}", requirements={"companyId" = "\d+"}, name="get_reservationes_by_company", options={"expose"=true})
     *
     * @param Request $request
     * @param         $companyId
     *
     * @return Reservation[]
     * @throws NonUniqueResultException
     */
    public function getReservationsByCompanyIdAction(Request $request, $companyId): array
    {
        return $this->reservationService->getreservationsByCompanyId($companyId);
    }

}
