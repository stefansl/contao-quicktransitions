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

class HookListener
{
    /**
     * Inject animation attributes.
     *
     * @param ContentModel $objElement
     * @param string       $strBuffer
     *
     * @return string
     */
    public function onGetContentElement(ContentModel $objElement, string $strBuffer): string
    {
        //dump($objElement);
        if (TL_MODE === 'BE' || !$objElement->cp_animation) {
            return $strBuffer;
        }

        $strBuffer = \preg_replace_callback(
            '|<([a-zA-Z0-9]+)(\s[^>]*?)?(?<!/)>|',
            function ($matches) {
                $strTag = $matches[1];
                $strAttributes = $matches[2];

                $strAnimAttr = '<'.$strTag.' data-animation="fade" '.$strAttributes.'>';

                return $strAnimAttr;
            },
            $strBuffer, 1
        );

        return $strBuffer;
    }
}
