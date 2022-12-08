<?php

/**
 * @Author: Gallarian <gallarian@gmail.com>
 */

declare(strict_types=1);

namespace App\Tests\Functional\Integration\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexRouterTest extends WebTestCase
{
    public function testIndexGet(): void
    {
        self::createClient()->request(Request::METHOD_GET, '/administration');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
}
