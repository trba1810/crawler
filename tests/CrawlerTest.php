<?php 


use Practice2020\Crawler\Crawler;

class CrawlerTest extends \PHPUnit_Framework_TestCase
{
    // public function testTrueAssertsToTrue()
    // {
    //     $this->assertTrue(true);
    // }

    // public function testPup()
    // {
    //     $craw = new Crawler;
    //     $craw->testPuppeteer();
    //     $this->assertFileExists('./bar.pdf');
    // }

    // public function testCrawl()
    // {
    //     $craw = new Crawler;
    //     $config = [
    //         "price" => 'document.querySelector("div.block.product-details-price > div.clearfix > div > span.product-price-value.value").innerText', 
    //     ];
    //     $craw->crawl('https://www.aksa.rs/osnovni-modeli-kolica/1585-graco-kolica-evo',$config);
    // }

    public function testBulk()
    {
        $craw = new Crawler;
        $urls = ['https://www.aksa.rs/osnovni-modeli-kolica/1585-graco-kolica-evo' , 'https://www.junglebaby.rs/kolica-od-0m/8933-bugaboo-decija-kolica-bee-6' , 
        'https://www.aksa.rs/posteljine/22277-lillopippo-punjena-posteljina-slatkisi', 'https://www.aksa.rs/prekrivaci-jorgani-i-cebad/20952-chicco-cebe-unisex'];
        $outputs = [
            [
                "domain" => 'aksa',
                "url" => 'www.aksa.rs',
                "data" => [
                "price" => 'document.querySelector("div.block.product-details-price > div.clearfix > div > span.product-price-value.value").innerText'
                ]
            ],
            
        ];
        $craw->bulkImport('https://www.aksa.rs/osnovni-modeli-kolica/1585-graco-kolica-evo',$outputs);
        print_r($craw->getBulk());
    }

}