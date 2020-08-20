# Time Ago In Words plugin for Craft CMS 3.x

Convert a datetime to a short string of how long ago it was


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

-Insert text here-

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

    TimeAgoInWords::getInstance()->timeAgoInWordsService->timeAgoInWords($entry->postDate);

## Time Ago In Words Roadmap

* I guess it should probably default to Craft's timezone?


Brought to you by [Bluemantis](https://bluemantis.com)
