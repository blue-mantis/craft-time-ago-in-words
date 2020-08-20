<?php
/**
 * Time Ago In Words plugin for Craft CMS 3.x
 *
 * Convert a datetime to a word representation of how long ago it was
 *
 * @link      https://bluemantis.com
 * @copyright Copyright (c) 2020 Bluemantis
 */

namespace bluemantis\timeagoinwords\services;

use bluemantis\timeagoinwords\TimeAgoInWords;
use Craft;
use craft\base\Component;

class TimeAgoInWordsService extends Component
{
    public function timeAgoInWords($datetime) {

        $settings = TimeAgoInWords::getInstance()->getSettings();

        // set timezone (default to 'Europe/London')
        $timezone = $settings->timezone ? $settings->timezone : 'Europe/London';
        date_default_timezone_set($timezone);

        // convert string to dateTime if not already
        if (!($datetime instanceof \DateTime)) {
            $datetime = new \DateTime($datetime);
        }

        // get past timestamp
        $past = $datetime->format('U');

        // get current timestamp
        $now = strtotime("now");

        // calculate time difference
        $distanceInSeconds = $now - $past;
        $distanceInMinutes = round($distanceInSeconds / 60);

        if ( $distanceInMinutes <= 1 ) {

            if ( $distanceInSeconds < 5 ) {
                return Craft::t('time-ago-in-words', 'less than 5 seconds');
            }
            if ( $distanceInSeconds < 10 ) {
                return Craft::t('time-ago-in-words', 'less than 10 seconds');
            }
            if ( $distanceInSeconds < 20 ) {
                return Craft::t('time-ago-in-words', 'less than 20 seconds');
            }
            if ( $distanceInSeconds < 40 ) {
                return Craft::t('time-ago-in-words', 'half a minute');
            }
            if ( $distanceInSeconds < 60 ) {
                return Craft::t('time-ago-in-words', 'less than a minute');
            }

            return Craft::t('time-ago-in-words', '1 minute');

        }
        if ( $distanceInMinutes < 45 ) {
            return Craft::t('time-ago-in-words', '{amount} minutes', array('amount' => $distanceInMinutes));
        }
        if ( $distanceInMinutes < 90 ) {
            return Craft::t('time-ago-in-words', '1 hour');
        }
        if ( $distanceInMinutes < 1440 ) {
            return Craft::t('time-ago-in-words', '{amount} hours', array('amount' => round(floatval($distanceInMinutes) / 60.0)));
        }
        if ( $distanceInMinutes < 2880 ) {
            return Craft::t('time-ago-in-words', '1 day');
        }
        if ( $distanceInMinutes < 43200 ) {
            return Craft::t('time-ago-in-words', '{amount} days', array('amount' => round(floatval($distanceInMinutes) / 1440)));
        }
        if ( $distanceInMinutes < 86400 ) {
            return Craft::t('time-ago-in-words', '1 month');
        }
        if ( $distanceInMinutes < 525600 ) {
            return Craft::t('time-ago-in-words', '{amount} months', array('amount' => round(floatval($distanceInMinutes) / 43200)));
        }
        if ( $distanceInMinutes < 1051199 ) {
            return Craft::t('time-ago-in-words', '1 year');
        }

        return Craft::t('time-ago-in-words', 'over {amount} years', array('amount' => round(floatval($distanceInMinutes) / 525600)));
    }
}
