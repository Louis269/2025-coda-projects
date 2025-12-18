<?php

namespace App\Controller\Wallets;

use App\Entity\Wallet;
use App\Service\ExpenseService;
use App\Service\WalletService;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

final class ShowController extends AbstractController
{
    #[Route('/wallets/{uid}', name: 'wallets_show', methods: ['GET'])]
    public function index(
        // va chercher en base le Wallet
        // qui a un champ uid = au paramètre
        // uid dans l'URL de la requête
        #[MapEntity(mapping: ["uid" => "uid"])]
        Wallet $wallet,

        ExpenseService $expenseService,
        WalletService $walletService,

        // numéro de page où l'on se trouve
        #[MapQueryParameter]
        int $page = 1,

        // nombre d'éléments par page
        #[MapQueryParameter]
        int $limit = 25,
    ): Response
    {
        // vérifier l'accès de l'utilisateur courant au wallet identifié par l'id

        // 1. récupérer l'utilisateur courant
        $connectedUser = $this->getUser();

        // 2. transformer l'ID du wallet, en wallet objet
        // plus haut -> MapEntity

        // 3. faire la vérification d'accès via le WalletService
        $xUserWallet = $walletService->getUserAccessOnWallet($connectedUser, $wallet);

        // si l'utilisateur courant n'a pas accès au wallet
        // on le redirige vers la liste des wallets avec un
        // message d'erreur
        // pour savoir s'il a accès, vérifier que $xUserWallet n'est pas null

        if (true === is_null($xUserWallet)) {
            // vu que xUserWallet est null, on vire le user

            // 1. setup un message d'erreur
            $this->addFlash("danger", "Vous n'avez pas accès à ce portefeuille");

            // 2. rediriger vers la liste des wallets
            return $this->redirectToRoute('wallets_list');
        }

        // récupérer les expenses du wallet
        $expenses = $expenseService->findExpensesForWallet($wallet, $page, $limit);

        // on passe les infos au rendu
        return $this->render('wallets/show/index.html.twig', [
            'wallet' => $wallet,
            'expenses' => $expenses,
        ]);
    }
}
