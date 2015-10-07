<?php

namespace spec\AwesomeCrawler\Models;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CredentialsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AwesomeCrawler\Models\Credentials');
    }

    function let()
    {
        $this->beConstructedWith('awesome@awesome.com', 'foobar');
    }

    function it_should_return_data()
    {
        $this->getEmail()->shouldReturn('awesome@awesome.com');
        $this->getPassword()->shouldReturn('foobar');
    }
}
