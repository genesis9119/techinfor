<?php

/**
 * @Author: Gallarian <gallarian@gmail.com>
 */

declare(strict_types=1);

namespace App\Controller\Admin\Security\Group;

use App\Repository\Security\GroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class IndexController extends AbstractController
{
    #[Route('/administration/groupes', name: 'admin_group_index', methods: ['GET'])]
    public function __invoke(GroupRepository $groupRepository): Response
    {
        return $this->render('admin/views/security/group/index.html.twig', [
            'groups' => $groupRepository->findAll()
        ]);
    }
}
