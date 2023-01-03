<?php

namespace bluemantis\timeagoinwords;

use bluemantis\timeagoinwords\models\Settings;
use bluemantis\timeagoinwords\services\TimeAgoInWordsService;
use bluemantis\timeagoinwords\variables\TimeAgoInWordsVariable;
use bluemantis\timeagoinwords\twigextensions\TimeAgoInWordsTwigExtension;

use Craft;
use craft\base\Model;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

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
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSettings = true;

    /**
     * @var bool
     */
    public bool $hasCpSection = false;

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

        $this->setComponents([
            'timeAgoInWords' => TimeAgoInWordsService::class,
        ]);

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

    protected function createSettingsModel(): ?Model
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
