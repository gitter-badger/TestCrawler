<?php

require "../vendor/autoload.php";


use Goutte\Client;

$guzzle = new GuzzleHttp\Client(['verify' => false]);

$client = new Client();
$client->setClient($guzzle);

$crawler = $client->request('GET', 'https://notcambule.com/connexion');
$form = $crawler->selectButton('Connexion')->form();

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

$crawler = $client->submit($form, array('_username' => 'jean-marie@yopmail.com', '_password' => '0000'));
$crawler = $client->click($crawler->selectLink('Evénements publics')->link());

echo '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8" />
        </head>
        <body>';
$crawler->filter('.title strong')->each(function ($node) {
    echo $node->text() . '<br />';
});
echo '</body></html>';
