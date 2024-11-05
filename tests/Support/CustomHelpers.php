<?php

declare(strict_types=1);

namespace Tests\Support;

use Codeception\Module;
use Tests\Support\AcceptanceTester;


class CustomHelpers extends Module
{
    public function scrollIntoView($selector): void
    {
        $this->getModule('WebDriver')->executeJS("document.querySelector('$selector').scrollIntoView();");
    }

    public function findSelectorByText(AcceptanceTester $I, string $selector, string $text)
    {
        $selectors = $I->grabMultiple($selector);
        foreach ($selectors as $selector) {
            if (strpos($selector, $text) !== false) {
                return $selector;
            }
        }
        return null;
    }
}