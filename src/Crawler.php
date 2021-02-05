<?php 
namespace Practice2020\Crawler;

use HeadlessChromium\BrowserFactory;
use Exception;

class Crawler
{
    private $data = [];
    public $errors = [];
    public $bulk = [];
    

    public function __construct()
    {
        
    }

    public function getData()
    {
        return $this->data;
    }

    public function getBulk()
    {
        return $this->bulk;
    }

    public function getConfig($config)
    {
        if(array_key_exists('price', $config)){
            return $this->config;
        }
        return $config = [];
    }

    public function set($name, $value)
    {
       $this->data[$name] = $value; 
    }

    public function testPuppeteer()
    {
        

        $browserFactory = new BrowserFactory('C:\Program Files (x86)\Google\Chrome\Application\chrome.exe');
    
        $browser = $browserFactory->createBrowser();
    
        $page = $browser->createPage();
        $page->navigate('http://example.com')->waitForNavigation();
        
        $pageTitle = $page->evaluate('document.title')->getReturnValue();
        
        $page->screenshot()->saveToFile('./bar.png');
        
        
        $page->pdf(['printBackground'=>false])->saveToFile('./bar.pdf');
        
        
        $browser->close();
    }

    public function crawl($url, $config = [])
    {
        $browserFactory = new BrowserFactory('C:\Program Files (x86)\Google\Chrome\Application\chrome.exe');
    
        $browser = $browserFactory->createBrowser();
    
        $page = $browser->createPage();

        $page->navigate($url)->waitForNavigation();
      
        foreach ($config as $key => $value) {
            
            
            try {
                $this->data[$key] = $page->evaluate($value)->getReturnValue();
                throw new Exception("Error on this key: " . $key);
            } catch (Exception $e) {
                echo $e->getMessage();
                continue;
            } 
            
            
        }

        $browser->close();

        return $this->data;
    }
    
    public function bulkImport($urls, $config = [])
    {
        $browserFactory = new BrowserFactory('C:\Program Files (x86)\Google\Chrome\Application\chrome.exe');
    
        $browser = $browserFactory->createBrowser();
    
        $page = $browser->createPage();

        $page->navigate($urls)->waitForNavigation();
        // foreach($urls as $url){
        //     $page->navigate($url)->waitForNavigation();
        // }

        /**
         * $outputs = [
            [
                "domain" => 'aksa',
                "url" => 'www.aksa.rs',
                "data" => [
                "price" => 'document.querySelector("div.block.product-details-price > div.clearfix > div > span.product-price-value.value").innerText'
                ]
            ],
            [
                "domain" => 'winwin',
                "url" => 'www.winwin.rs',
                "data" => [
                "price" => 'document.querySelector("div.block.product-details-price > div.clearfix > div > span.product-price-value.value").innerText'
                ]
            ],
            
        ];
         */
        $configs = [
                [
                    "domain" => 'aksa',
                    "url" => 'www.aksa.rs',
                    "data" => [
                    "price" => 'document.querySelector("div.block.product-details-price > div.clearfix > div > span.product-price-value.value").innerText'
                    ]
                ],
                [
                    "domain" => 'winwin',
                    "url" => 'www.winwin.rs',
                    "data" => [
                    "price" => 'document.querySelector("div.block.product-details-price > div.clearfix > div > span.product-price-value.value").innerText'
                    ]
                ],
        
            ];


        foreach($configs as $config){
            if(is_array($config)){
                foreach($config as $conf){
                    $bulk = $conf;
                }
            }
            $bulk[] = $config;
            print_r($bulk);
            PHP_EOL;
            // kako razdvojiti???
        }
        // foreach($config as $key => $value)
        // {
        //     try {
        //         // kako da targetiram key?
        //         foreach($value as $k => $info)
        //         {
        //             // $this->$data[$k] = $page->evaluate($info)->getReturnValue();
                    
        //             print_r($data[$k]);
                    
        //         }
                
        //         throw new Exception("Error on this key: " . $key);
        //     } catch (Exception $e) {
        //         echo $e->getMessage();
        //         continue;
        //     } 
        // }
        $browser->close();

        return $this->bulk;
    }
    
}


