<?php 


use Practice2020\Crawler\Crawler;

class CrawlerTest extends \PHPUnit_Framework_TestCase
{
    public function testTrueAssertsToTrue()
    {
        $this->assertTrue(true);
    }

    public function testPup()
    {
        $craw = new Crawler();
        $this->assertTrue($craw INSTANCEOF Crawler);
        $craw->testPuppeteer();
        $abla = file_exists('example.png');
        $this->assertTrue($abla);
    }

}