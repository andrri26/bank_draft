<?php

namespace App\Controller;

use App\Entity\Cheque;
use App\Repository\ChequeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/", name="app")
     */
    public function index(ChequeRepository $chequeRepository): Response
    {
        $bank = Cheque::BANK;
        $bank_cheque_count = [];

        foreach ($bank as $k => $v){
            $count = $chequeRepository->findByBank($k);
            $bank_cheque_count[$v] = $count;
        }

        return $this->render('app/index.html.twig', [
            'bank_cheque_count' => $bank_cheque_count
        ]);
    }
}
