<?php

namespace BladeBuilder\Tests;

use BladeBuilder\App;
use org\bovigo\vfs\vfsStream;

class AppTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        vfsStream::setup('root', null, [
            'views' => [
                '_layouts' => [
                    'app.blade.php' => '<p>@include("_partials.top")</p><div>@yield("content")</div>'
                ],
                '_partials' => [
                    'top.blade.php' => 'top'
                ],
                'test.blade.php' => '@extends("_layouts.app")'.PHP_EOL.'@section("content") content @endsection'
            ],
            'cache' => [],
            'compiled' => []
        ]);
    }

    public function testRenderView()
    {
        $app = new App(
            vfsStream::url('root/views'),
            vfsStream::url('root/cache')
        );

        $this->assertEquals('<p>top</p><div> content </div>', $app->renderView('test'));
    }

    public function testRenderInvalidView()
    {
        $app = new App(
            vfsStream::url('root/views'),
            vfsStream::url('root/cache')
        );

        $this->expectException('InvalidArgumentException');
        $app->renderView('_layouts');
    }
}
