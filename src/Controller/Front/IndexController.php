<?php

/**
 * @Author: Gallarian <gallarian@gmail.com>
 */

declare(strict_types=1);

namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

final class IndexController
{
    #[Route('/', name: 'front_index', methods: ['GET'])]
    public function __invoke(Environment $twig): Response
    {
        return new Response($twig->render('front/views/index.html.twig'));
    }
}
