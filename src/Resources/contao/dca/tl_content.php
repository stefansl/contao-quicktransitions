<?php

/**
 * This file is part of the Contao Quicktransitions Bundle.
 *
 * (c) CLICKPRESS <https://clickpress.de>
 *
 * @package   contao-quicktransitions
 * @author    Stefan Schulz-Lauterbach <https://github.com/stefansl>
 * @license   MIT
 * @copyright clickpress.de 2018
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_content']['fields']['cp_animation'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_metten_content']['cp_animation'],
    'exclude'                 => true,
    'default'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50 m12'),
    'sql'                     => "char(1) NOT NULL default ''"
);

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function()
{
    foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $palette)
    {
        if (\is_string($palette))
        {
            PaletteManipulator::create()
                ->addField('cp_animation', 'expert_legend', PaletteManipulator::POSITION_APPEND)
                ->applyToPalette($key, 'tl_content');
        }
    }
};
