<?php

namespace bluemantis\timeagoinwords\variables;

use bluemantis\timeagoinwords\TimeAgoInWords;

use Craft;

class TimeAgoInWordsVariable
{
    public function convert($dateTime)
    {
        return TimeAgoInWords::getInstance()->timeAgoInWords->convert($dateTime);
    }
}
