<?php

namespace Tests\App\Controller;

use App\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @see DefaultController
 */
class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $response = $client->getResponse();

        $this->assertEquals(302, $response->getStatusCode(), $response->getContent());
        $this->assertTrue($crawler->filter('html:contains("Redirecting to http://localhost/login")')->count() > 0);
    }
}
