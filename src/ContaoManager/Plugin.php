<?php

/*
 * This file is part of ContaoQuicktransitionsBundle.
 *
 * (c) Stefan Schulz-Lauterbach
 *
 * @license LGPL-3.0-or-later
 */

namespace Clickpress\ContaoQuicktransitions\ContaoManager;

use Clickpress\ContaoQuicktransitions\ContaoQuicktransitionsBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoQuicktransitionsBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
