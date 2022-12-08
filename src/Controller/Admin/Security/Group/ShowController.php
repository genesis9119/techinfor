<?php

/**
 * @Author: Gallarian <gallarian@gmail.com>
 */

declare(strict_types=1);

namespace App\Controller\Admin\Security\Group;

use App\Entity\Security\Group;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    #[Route('//administration/groupes/{uuid}', name: 'admin_group_show', methods: ['GET'])]
    public function __invoke(Group $group): Response
    {
        return $this->render('admin/views/security/group/show.html.twig', compact('group'));
    }
}
