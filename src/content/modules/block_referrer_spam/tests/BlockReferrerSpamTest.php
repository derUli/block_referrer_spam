<?php

use Spatie\Snapshots\MatchesSnapshots;

class BlockReferrerSpamTest extends \PHPUnit\Framework\TestCase {

    use MatchesSnapshots;

    protected function tearDown(): void {
        if (isset($_SERVER["HTTP_REFERER"])) {
            unset($_SERVER["HTTP_REFERER"]);
        }
    }

    public function testIsReferrerSpamReturnsTrue(): void {
        $controller = new BlockReferrerSpam();
        $this->assertEquals("casino-v.site", $controller->isReferrerSpam("http://casino-v.site"));
        $this->assertEquals("buttons-for-website.com", $controller->isReferrerSpam("https://buttons-for-website.com/buy-cheap-viagra"));
        $this->assertEquals("youporn-ru.com", $controller->isReferrerSpam("https://youporn-ru.com/great-tits"));
        $this->assertEquals("constanceonline.top", $controller->isReferrerSpam("https://constanceonline.top/foo"));
    }

    public function testIsReferrerSpamReturnsFalse(): void {
        $controller = ModuleHelper::getMainController("block_referrer_spam");
        $this->assertNull($controller->isReferrerSpam("http://www.google.de"));
        $this->assertNull($controller->isReferrerSpam("https://en.ulicms.de/current_versions.html"));
        $this->assertNull($controller->isReferrerSpam(""));
        $this->assertNull($controller->isReferrerSpam(null));
    }

    public function testGetMessageReturnsString() {
        $_SERVER["HTTP_REFERER"] = "https://youporn-ru.com/great-tits";
        $controller = new BlockReferrerSpam();
        $this->assertMatchesTextSnapshot($controller->_getMessage());
    }

    public function testGetMessageReturnsNull() {
        $_SERVER["HTTP_REFERER"] = "https://www.google.de";
        $controller = new BlockReferrerSpam();
        $this->assertNull($controller->_getMessage());
    }

}
