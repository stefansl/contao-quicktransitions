<?php

declare(strict_types=1);

/**
 * This file is part of the Contao Quicktransitions Bundle.
 *
 * (c) CLICKPRESS <https://clickpress.de>
 *
 * @license   MIT
 * @copyright clickpress.de 2018
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_content']['fields']['cp_animation'] = [
    'exclude' => true,
    'default' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

/*
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = static function (): void {
    foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $palette) {
        if (is_string($palette)) {
            PaletteManipulator::create()
                ->addField('cp_animation', 'expert_legend', PaletteManipulator::POSITION_APPEND)
                ->applyToPalette($key, 'tl_content')
            ;
        }
    }
};
