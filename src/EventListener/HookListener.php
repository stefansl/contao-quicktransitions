<?php

/*
 * This file is part of ContaoQuicktransitionsBundle.
 *
 * (c) Stefan Schulz-Lauterbach
 *
 * @license LGPL-3.0-or-later
 */

namespace Clickpress\ContaoQuicktransitions\EventListener;

use Contao\ContentElement;
use Contao\ContentModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\HttpFoundation\RequestStack;

class HookListener
{
    private $requestStack;
    private $scopeMatcher;

    public function __construct(RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
    }

    #[AsHook('onGetContentElement', priority: 100)]
    public function onGetContentElement(ContentModel $contentModel, string $buffer): string
    {
        if ($this->scopeMatcher->isBackendRequest($this->requestStack->getCurrentRequest()) || !$contentModel->cp_animation) {
            return $buffer;
        }

        $buffer = \preg_replace_callback(
            '|<([a-zA-Z0-9]+)(\s[^>]*?)?(?<!/)>|',
            static function ($matches) {
                $strTag = $matches[1];
                $strAttributes = $matches[2];

                return '<'.$strTag.' data-animation="fade" '.$strAttributes.'>';
            },
            $buffer, 1
        );

        return $buffer;
    }
}
