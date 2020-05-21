<?php

namespace Tests\Lvinceslas\Html;

require 'src/html/HtmlTemplate.php';

use Lvinceslas\Html\HtmlTemplate;
use PHPUnit\Framework\TestCase;

class HtmlTemplateTest extends TestCase
{
    public function testCanBeCreatedFromValidHtmlTemplateFile(): void
    {
        $this->assertInstanceOf(
            HtmlTemplate::class,
            new HtmlTemplate('./tests/test.html')
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
            'Hello <b>{%NAME%}</b>, you have successfully installed <em>lvincesl/html_template</em> !',
            new HtmlTemplate('./tests/test.html')
        );
    }
}
