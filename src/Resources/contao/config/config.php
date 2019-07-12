<?php

$GLOBALS['TL_HOOKS']['getContentElement'][] = ['Clickpress\ContaoQuicktransitions\EventListener\HookListener', 'onGetContentElement'];
