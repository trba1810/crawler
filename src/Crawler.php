<?php 
namespace Practice2020\Crawler;

use HeadlessChromium\BrowserFactory;

class Crawler
{
    // private $data = 5;

    public function __construct()
    {
        
    }

    public function get($data)
    {
        return $this->data;
    }

    public function testPuppeteer()
    {
        

        $browserFactory = new BrowserFactory('C:\Program Files (x86)\Google\Chrome\Application\chrome.exe');
    
        // starts headless chrome
        $browser = $browserFactory->createBrowser();
    
        // creates a new page and navigate to an url
        $page = $browser->createPage();
        $page->navigate('http://example.com')->waitForNavigation();
        
        // get page title
        $pageTitle = $page->evaluate('document.title')->getReturnValue();
        
        // screenshot - Say "Cheese"! 😄
        $page->screenshot()->saveToFile('./bar.png');
        
        // pdf
        $page->pdf(['printBackground'=>false])->saveToFile('./bar.pdf');
        
        // bye
        $browser->close();
    }
}



