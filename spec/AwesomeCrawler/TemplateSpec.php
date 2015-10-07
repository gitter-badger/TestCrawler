<?php

namespace spec\AwesomeCrawler;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemplateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AwesomeCrawler\Template');
    }

    function let()
    {
        $this->beConstructedWith('something');
    }

    function it_should_render_html()
    {
        $this->render()->shouldContains('something');
        $this->render()->shouldStartsWith('<!DOCTYPE html>');
    }

    public function getMatchers()
    {
        return [
            'contains' => function ($subject, $match) {
                return strpos($subject, $match) !== false;
            },
            'startsWith' => function ($subject, $needle) {
                return $needle === "" || strrpos($subject, $needle, -strlen($subject)) !== FALSE;
            }
        ];
    }
}
