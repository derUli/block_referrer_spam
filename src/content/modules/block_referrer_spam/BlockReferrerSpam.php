<?php

use phpDocumentor\Reflection\Types\Nullable;

class BlockReferrerSpam extends Controller {

    private $moduleName;

    public function __construct() {
        $this->moduleName = basename(dirname(__FILE__));
    }

    // Check for referrer spam
    public function beforeInit() {
        $message = $this->_getMessage();
        if ($message) {
            HTMLResult($message, 403);
        }
    }

    public function _getMessage(): ?string {
        $text = null;
        $isSpam = $this->isReferrerSpam(get_referrer());
        if ($isSpam) {
            $text = "Request blocked due referrer spam.\n";
            $text .= "Rule: {$isSpam}";
            $text = nl2br($text);
        }
        return $text;
    }

    // Get list of forbidden words as array
    public function getList() {
        $file = ModuleHelper::buildModuleRessourcePath(
                        $this->moduleName,
                        "vendor/matomo/referrer-spam-blacklist/spammers.txt",
                        true
        );
        $list = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        sort($list);
        return $list;
    }

    // returns true if a referrer is a spam referrer
    public function isReferrerSpam($referrer) {
        $isSpam = null;
        $list = $this->getList();
        foreach ($list as $spam) {
            if (str_contains(strtolower($referrer), $spam)) {
                $isSpam = $spam;
            }
        }
        return $isSpam;
    }

}
