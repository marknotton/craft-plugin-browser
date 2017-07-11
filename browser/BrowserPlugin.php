<?php
namespace Craft;

require_once 'vendor/autoload.php';

class BrowserPlugin extends BasePlugin {
  public function getName() {
    return Craft::t('Browser');
  }

  public function getVersion() {
    return '0.1';
  }

  public function getSchemaVersion() {
    return '0.1';
  }

  public function getDescription() {
    return 'Gathers serverside information on the users agent data.';
  }

  public function getDeveloper() {
    return 'Yello Studio';
  }

  public function getDeveloperUrl() {
    // Sourced from 'https://github.com/jenssegers/agent';
    return 'http://yellostudio.co.uk';
  }

  public function getDocumentationUrl() {
    return 'https://github.com/marknotton/craft-plugin-browser';
    // return 'https://github.com/jenssegers/agent';
  }

  public function getReleaseFeedUrl() {
    return 'https://raw.githubusercontent.com/marknotton/craft-plugin-browser/master/browser/releases.json';
  }

  public function addTwigExtension() {
    if (!craft()->isConsole() && craft()->request->isSiteRequest() && craft()->plugins->getPlugin('settings')) {
      craft()->settings->addGlobals($this->getGlobals());
    } else {
      Craft::import('plugins.browser.twigextensions.Browser_Globals');
      return new Browser_Globals();
    }
  }

  public function getGlobals() {
    return array(
      'browser' => craft()->browser,
      'local' => ($_SERVER['REMOTE_ADDR']=='127.0.0.1'),
      'robot' => craft()->browser->agent->isRobot(),
      'isMobile' => craft()->browser->agent->isMobile() || craft()->browser->agent->isTablet(),
    );
  }

}
