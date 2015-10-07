<?php

namespace spec\AwesomeCrawler;

use Goutte\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CrawlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AwesomeCrawler\Crawler');
    }

    function let(Client $client)
    {
        $this->beConstructedWith($client);
    }
}
