<?php

namespace AwesomeCrawler;


use AwesomeCrawler\Models\Credentials;
use Goutte\Client;

/**
 * Class Crawler
 *
 * Awesome crawler.
 */
class Crawler
{
    /**
     * @var Client
     */
    private $client;

    public function __construct($client = null)
    {
        $this->client = $client ?: $this->createClient();
    }

    private function createClient()
    {
        // Get the awesome by not checking ssl certificate
        $guzzle = new \GuzzleHttp\Client(['verify' => false]);

        $client = new Client();
        $client->setClient($guzzle);

        return $client;
    }

    public function getAwesomeEvents(Credentials $credentials)
    {
        $crawler = $this->client->request('GET', 'https://notcambule.com/connexion');
        $form = $crawler->selectButton('Connexion')->form();

        // Close your eyes
        $reflectionClass = new \ReflectionClass('Symfony\Component\DomCrawler\Form');
        $property = $reflectionClass->getProperty('baseHref');
        $property->setAccessible(true);
        $property->setValue($form, 'https://notcambule.com/verification/connexion');
        $property = $reflectionClass->getProperty('currentUri');
        $property->setAccessible(true);
        $property->setValue($form, 'https://notcambule.com/verification/connexion');
        $property = $reflectionClass->getProperty('method');
        $property->setAccessible(true);
        $property->setValue($form, 'POST');
        // YOU SAW NOTHING


        $crawler = $this->client->submit($form, array('_username' => $credentials->getEmail(), '_password' => $credentials->getPassword()));
        $crawler = $this->client->click($crawler->selectLink('Evénements publics')->link());

        $res = [];
        $crawler->filter('.title strong')->each(function ($node) use (&$res) {
            $res[] = $node->text();
        });

        return $res;
    }
}
