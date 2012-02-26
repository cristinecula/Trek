<?php

namespace Testes\Renderer;
use Testes\Renderer\RendererInterface;
use Testes\Test\TestInterface;

/**
 * Renders the test output in html format.
 * 
 * @category UnitTesting
 * @package  Testes
 * @author   Trey Shugart <treshugart@gmail.com>
 * @license  Copyright (c) 2010 Trey Shugart http://europaphp.org/license
 */
class Html implements RendererInterface
{
    /**
     * Renders the test results.
     * 
     * @param TestInterface $test The test to output.
     * 
     * @return string
     */
    public function render(TestInterface $test)
    {
        $cli = new Cli;
        $str = $cli->render($test);
        $str = nl2br($str);
        return $str;
    }
}
