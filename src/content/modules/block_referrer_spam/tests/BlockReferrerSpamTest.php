<?php

class BlockReferrerTest extends PHPUnit_Framework_TestCase
{
    
    public function testSpam()
    {
        $controller = ModuleHelper::getMainController("block_referrer_spam");
        $this->assertEquals(".win", $controller->isReferrerSpam("http://iphone.win"));
        $this->assertEquals("buttons-for-website.com", $controller->isReferrerSpam("https://buttons-for-website.com/buy-cheap-viagra"));
        $this->assertEquals("youporn-ru.com", $controller->isReferrerSpam("https://youporn-ru.com/great-tits"));
        $this->assertEquals(".top", $controller->isReferrerSpam("download.top"));
    }
    
    public function testNoSpam()
    {
        $controller = ModuleHelper::getMainController("block_referrer_spam");
        $this->assertNull($controller->isReferrerSpam("http://www.google.de"));
        $this->assertNull($controller->isReferrerSpam("https://en.ulicms.de/current_versions.html"));
        $this->assertNull($controller->isReferrerSpam(""));
        $this->assertNull($controller->isReferrerSpam(null));
    }
}