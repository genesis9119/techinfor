<?php

/**
 * @Author: Gallarian <gallarian@gmail.com>
 */

declare(strict_types=1);

namespace App\Tests\Functional\Integration\Admin\Security;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupRouterTest extends WebTestCase
{
    public function testIndexGet(): void
    {
        self::createClient()->request(Request::METHOD_GET, '/administration/groupes');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
}
