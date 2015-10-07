<?php

namespace AwesomeCrawler;

/**
 * Class Template
 *
 * Awesome template.
 */
class Template
{
    /**
     * @var string
     */
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function render()
    {
        $content = '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8" />
        </head>
        <body>';
        $content .= $this->content;
        $content .= '</body></html>';

        return $content;
    }
}
