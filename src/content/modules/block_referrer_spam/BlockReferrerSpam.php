<?php
use phpDocumentor\Reflection\Types\Nullable;

class BlockReferrerSpam extends Controller
{

    private $moduleName;

    public function __construct()
    {
        $this->moduleName = basename(dirname(__FILE__));
    }

    // Check for referrer spam
    public function beforeInit()
    {
        $isSpam = $this->isReferrerSpam(get_referrer());
        if ($isSpam) {
            $text = "Request blocked due referrer spam.\n";
            $text .= "Rule: {$isSpam}";
            $text = nl2br($text);
            HTMLResult($text, 403);
        }
    }

    // Get list of forbidden words as array
    public function getList()
    {
        $file = ModuleHelper::buildModuleRessourcePath($this->moduleName, "list.txt", true);
        $list = file_get_contents($file);
        $list = normalizeLN($list, "\n");
        $list = explode("\n", $list);
        $list = array_map("trim", $list);
        $list = array_filter($list, "strlen");
        $list = array_filter($list, "strtolower");
        sort($list);
        return $list;
    }

    // returns true if a referrer is a spam referrer
    public function isReferrerSpam($referrer)
    {
        $isSpam = null;
        $list = $this->getList();
        foreach ($list as $spam) {
            if (str_contains($spam, strtolower($referrer))) {
                $isSpam = $spam;
            }
        }
        return $isSpam;
    }
}