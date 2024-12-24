<?php

/*
 * This file is part of ContaoQuicktransitionsBundle.
 *
 * (c) Stefan Schulz-Lauterbach
 *
 * @license LGPL-3.0-or-later
 */

namespace Clickpress\ContaoQuicktransitions\EventListener;

use Contao\ContentModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\HttpFoundation\RequestStack;

use function preg_replace_callback;

#[AsHook('getContentElement')]
class GetContentElementListener
{
    private RequestStack $requestStack;
    private ScopeMatcher $scopeMatcher;

    public function __construct(RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
    }


    public function __invoke(ContentModel $contentModel, string $buffer, $element): string
    {
        if (!$contentModel->cp_animation || $this->scopeMatcher->isBackendRequest(
            $this->requestStack->getCurrentRequest()
        )) {
            return $buffer;
        }

        return preg_replace_callback(
            '|<([a-zA-Z0-9]+)(\s[^>]*?)?(?<!/)>|',
            static function ($matches) {
                $strTag = $matches[1];
                $strAttributes = $matches[2] ?? null;

                return '<' . $strTag . ' data-animation="fade" ' . $strAttributes . '>';
            },
            $buffer,
            1
        );
    }
}
