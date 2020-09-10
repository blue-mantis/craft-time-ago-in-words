<?php

namespace bluemantis\timeagoinwords\twigextensions;

use bluemantis\timeagoinwords\TimeAgoInWords;

use Craft;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

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
        return TimeAgoInWords::getInstance()->timeAgoInWords->convert($datetime);
    }
}
