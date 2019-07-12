<?php

/*
 * This file is part of ContaoQuicktransitionsBundle.
 *
 * (c) Stefan Schulz-Lauterbach
 *
 * @license LGPL-3.0-or-later
 */

namespace Clickpress\ContaoQuicktransitionsBundle\Tests;

use Clickpress\ContaoQuicktransitions\ClickpressContaoQuicktransitionsBundle;
use PHPUnit\Framework\TestCase;

class ContaoQuicktransitionsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ClickpressContaoQuicktransitionsBundle();

        $this->assertInstanceOf('Clickpress\ContaoQuicktransitions\ClickpressContaoQuicktransitionsBundle', $bundle);
    }
}
