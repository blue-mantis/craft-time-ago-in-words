<?php
/**
 * Time Ago In Words plugin for Craft CMS 3.x
 *
 * Convert a datetime to a word representation of how long ago it was
 *
 * @link      https://bluemantis.com
 * @copyright Copyright (c) 2020 Bluemantis
 */

namespace bluemantis\timeagoinwords\twigextensions;

use bluemantis\timeagoinwords\TimeAgoInWords;

use Craft;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @author    Bluemantis
 * @package   TimeAgoInWords
 * @since     1.0.0
 */
class TimeAgoInWordsTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'TimeAgoInWords';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new TwigFilter('timeAgoInWords', [$this, 'timeAgoInWords']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('timeAgoInWords', [$this, 'timeAgoInWords']),
        ];
    }

    /**
     * @param null $text
     *
     * @return string
     */
    public function timeAgoInWords($datetime)
    {
        return TimeAgoInWords::getInstance()->timeAgoInWordsService->timeAgoInWords($datetime);
    }
}
