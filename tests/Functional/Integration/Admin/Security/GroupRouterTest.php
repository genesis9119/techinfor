<?php

/**
 * @Author: Gallarian <gallarian@gmail.com>
 */

declare(strict_types=1);

namespace App\Tests\Functional\Integration\Admin\Security;

use App\Entity\Security\Group;
use App\Repository\Security\GroupRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class GroupRouterTest extends WebTestCase
{
    private KernelBrowser $client;
    private ?Group $group;

    public function setUp(): void
    {
        $this->client = self::createClient();
        $this->group = self::getContainer()->get(GroupRepository::class)->findOneBy([]);
    }

    public function testIndexGet(): void
    {
        $this->client->request(Request::METHOD_GET, '/administration/groupes');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testShowGet(): void
    {
        if ($this->group) {
            $this->client->request(Request::METHOD_GET, "/administration/groupes/{$this->group->getUuid()}");

            $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        } else {
            $this->client->request(Request::METHOD_GET, '/administration/groupes/0');

            $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
        }
    }
}
