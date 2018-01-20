<?php
class BlockReferrerTest extends PHPUnit_Framework_TestCase {
	public function testSpam() {
		$controller = ModuleHelper::getMainController ( "block_referrer_spam" );
		$this->assertTrue ( $controller->isReferrerSpam ( "http://www.awesome-casino.ru" ) );
		$this->assertTrue ( $controller->isReferrerSpam ( "https://cheap-cialis.com/buy" ) );
		$this->assertTrue ( $controller->isReferrerSpam ( "/best-insurance" ) );
		$this->assertTrue ( $controller->isReferrerSpam ( "best/bet" ) );
	}
	public function testNoSpam() {
		$controller = ModuleHelper::getMainController ( "block_referrer_spam" );
		$this->assertFalse ( $controller->isReferrerSpam ( "http://www.google.de" ) );
		$this->assertFalse ( $controller->isReferrerSpam ( "https://en.ulicms.de/current_versions.html" ) );
		$this->assertFalse ( $controller->isReferrerSpam ( "" ) );
		$this->assertFalse ( $controller->isReferrerSpam ( null ) );
	}
}