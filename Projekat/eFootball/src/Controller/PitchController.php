<?php


namespace App\Controller;


use Doctrine\Common\Collections\ArrayCollection;
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
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getPitchByIdAction(Request $request, $id)
    {
        $pitch = $this->pitchService->getpitchById($id);
        if (empty($pitch)) {
            throw new NotFoundHttpException('Can not find pitch with given id');
        }

//        return $pitch;
        dd($pitch);
    }

    /**
     * @Route("/pitches/company/{companyId}", requirements={"companyId" = "\d+"}, name="get_pitches_by_company", options={"expose"=true})
     *
     * @param Request $request
     * @param         $companyId
     *
     * @return \App\Entity\Pitch[]
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getPitchesByCompanyIdAction(Request $request, $companyId)
    {
        /** @var ArrayCollection $pitches */
        $pitches = $this->pitchService->getPitchesByCompanyId($companyId);

//        return $pitches;
        dd($pitches->getValues());
    }
}