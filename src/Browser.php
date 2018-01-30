<?php
/**
 * Browser plugin for Craft CMS 3.x
 *
 * Query the server-side information from the users agent data.
 *
 * @link      https://github.com/marknotton/
 * @copyright Copyright (c) 2018 Mark Notton
 */

namespace marknotton\browser;

use marknotton\browser\services\BrowserService;
use marknotton\browser\variables\BrowserVariable;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class Browser
 *
 * @author    Mark Notton
 * @package   Browser
 * @since     1.0.0
 *
 * @property  BrowserServiceService $browserService
 */
class Browser extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Browser
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        $this->setComponents([
            'browserService' => \marknotton\browser\services\BrowserService::class,
        ]);

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('browser', BrowserVariable::class);
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
                'browser',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
