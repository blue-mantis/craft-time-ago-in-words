# Time Ago In Words plugin for Craft CMS 3.x

Convert a date to a short string of how long ago that date was


## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require bluemantis/craft-time-ago-in-words

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Time Ago In Words.

## Time Ago In Words Overview

- Takes a DateTime object or ISO8601 compatible string and converts it into a string representation of how long ago that date was.  ie, "5 seconds ago", "3 hours ago", "8 days ago", etc

## Configuring Time Ago In Words

-This plugin defaults to Europe/London but can be manually set on the plugin settings page

## Using Time Ago In Words

Its available as a Twig filter:

    {{ entry.postDate|timeAgoInWords }}
    
And function:
    
    {{ timeAgoInWords(entry.postDate) }}
    
You can also convert via the variable:

    {{ craft.timeAgoInWords.convert(entry.postDate) }}
    
And the service:

    return TimeAgoInWords::getInstance()->timeAgoInWords->convert($dateTime);

## Time Ago In Words Roadmap

* I guess it should probably default to Craft's timezone?


Brought to you by [Bluemantis](https://bluemantis.com)
