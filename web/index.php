<?php

use AwesomeCrawler\Crawler;
use AwesomeCrawler\Models\Credentials;
use AwesomeCrawler\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Parser;

require "../vendor/autoload.php";


$yaml = new Parser();
$config = $yaml->parse(file_get_contents(__DIR__ . '/../config.yml'));

$crawler = new Crawler();
$events = $crawler->getAwesomeEvents(new Credentials($config['credentials']['email'], $config['credentials']['password']));
$template = new Template(implode('<br />', $events));

$response = new Response($template->render());
$response->send();
