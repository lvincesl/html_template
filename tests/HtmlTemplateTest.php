<?php

namespace Tests\Lvinceslas\Html;

require 'src/HtmlTemplate.php';

use Lvinceslas\Html\HtmlTemplate;
use PHPUnit\Framework\TestCase;
use stdClass;

class HtmlTemplateTest extends TestCase
{
    public function testCanBeCreatedFromValidHtmlTemplateFile(): void
    {
        $this->assertInstanceOf(
            HtmlTemplate::class,
            new HtmlTemplate(__DIR__.'/test.html')
        );
    }

    public function testCannotBeCreatedFromInvalidHtmlTemplateFile(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new HtmlTemplate('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'Hello <b>{%NAME%}</b>, you have successfully installed <em>lvinceslas/htmltemplate</em> !',
            new HtmlTemplate(__DIR__.'/test.html')
        );
    }

    public function testGetFilepath():void
    {
        $v = new HtmlTemplate(__DIR__.'/test.html');
        $this->assertTrue(is_string($v->getFilepath()));
    }

    public function testSetFilepathWithInvalidFilepath(): void
    {
        $this->expectException(\TypeError::class);
        $v = new HtmlTemplate(__DIR__.'/test.html');
        $v->setFilepath(new stdClass());

    }

    public function testSetFilepathWithUnfoundilepath(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $v = new HtmlTemplate(__DIR__.'/test.html');
        $v->setFilepath(__DIR__.'/unfound.html');

    }

    public function testSetFilepathWithValidFilepath(): void
    {
        $v = new HtmlTemplate(__DIR__.'/test.html');
        $this->assertEquals(true, $v->setFilepath(__DIR__.'/test.html'));

    }

    public function testSetWithInvalidName(): void
    {
        $this->expectException(\TypeError::class);
        $v = new HtmlTemplate(__DIR__.'/test.html');
        $v->set(new stdClass());
    }
}
