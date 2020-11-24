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
        $craw = new Crawler;
        $craw->testPuppeteer();
        $this->assertFileExists('/foo/bar.pdf');
        // $this->assertFileExists('/path/to/file');
    }

}