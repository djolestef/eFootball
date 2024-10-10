<?php


namespace App\Controller;


use App\Entity\Pitch;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\Pitch\PitchService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PitchController
{
    /** @var PitchService */
    protected $pitchService;

    public function __construct(PitchService $pitchService)
    {
        $this->pitchService = $pitchService;
    }

    /**
     * @Route("/pitch/{id}", requirements={"id" = "\d+"}, name="get_pitch", options={"expose"=true})
     *
     * @param Request $request
     * @param         $id
     *
     * @throws NonUniqueResultException
     */
    public function getPitchByIdAction(Request $request, $id): Pitch
    {
        $pitch = $this->pitchService->getpitchById($id);
        if (empty($pitch)) {
            throw new NotFoundHttpException('Can not find pitch with given id');
        }

        return $pitch;
    }

    /**
     * @Route("/pitches/company/{companyId}", requirements={"companyId" = "\d+"}, name="get_pitches_by_company", options={"expose"=true})
     *
     * @param Request $request
     * @param         $companyId
     *
     * @return Pitch[]
     * @throws NonUniqueResultException
     */
    public function getPitchesByCompanyIdAction(Request $request, $companyId): array
    {
        return $this->pitchService->getPitchesByCompanyId($companyId);
    }
}
