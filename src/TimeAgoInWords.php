<?php
/**
 * Time Ago In Words plugin for Craft CMS 3.x
 *
 * Convert a datetime to a word representation of how long ago it was
 *
 * @link      https://bluemantis.com
 * @copyright Copyright (c) 2020 Bluemantis
 */

namespace bluemantis\timeagoinwords;

use bluemantis\timeagoinwords\models\Settings;
use bluemantis\timeagoinwords\services\TimeAgoInWords as TimeAgoInWordsServiceService;
use bluemantis\timeagoinwords\variables\TimeAgoInWordsVariable;
use bluemantis\timeagoinwords\twigextensions\TimeAgoInWordsTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class TimeAgoInWords
 *
 * @author    Bluemantis
 * @package   TimeAgoInWords
 * @since     1.0.0
 *
 * @property  TimeAgoInWordsServiceService $timeAgoInWordsService
 */
class TimeAgoInWords extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var TimeAgoInWords
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     * @var bool
     */
    public $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new TimeAgoInWordsTwigExtension());

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('timeAgoInWords', TimeAgoInWordsVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'time-ago-in-words',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    protected function createSettingsModel()
    {
        return new Settings();
    }

    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'time-ago-in-words/_settings',
            [
                'settings' => $this->getSettings(),
            ]
        );
    }

}
