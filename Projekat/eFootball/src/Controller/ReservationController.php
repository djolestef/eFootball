<?php

namespace App\Controller;

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
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getReservationByIdAction(Request $request, $id)
    {
        $reservation = $this->reservationService->getreservationById($id);
        if (empty($reservation)) {
            throw new NotFoundHttpException('Can not find reservation with given id');
        }

//        return $reservation;
        dd($reservation);
    }

    /**
     * @Route("/reservations/company/{companyId}", requirements={"companyId" = "\d+"}, name="get_reservationes_by_company", options={"expose"=true})
     *
     * @param Request $request
     * @param         $companyId
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getReservationsByCompanyIdAction(Request $request, $companyId)
    {
        /** @var ArrayCollection $reservations */
        $reservations = $this->reservationService->getreservationsByCompanyId($companyId);

//        return $reservations;
        dd($reservations);
    }

}