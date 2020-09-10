<?php

namespace bluemantis\timeagoinwords\variables;

use bluemantis\timeagoinwords\TimeAgoInWords;

class TimeAgoInWordsVariable
{
    public function convert($dateTime)
    {
        return TimeAgoInWords::getInstance()->timeAgoInWords->convert($dateTime);
    }
}
