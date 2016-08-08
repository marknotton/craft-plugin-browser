<?php
namespace Craft;

class BrowserPlugin extends BasePlugin {
  public function getName() {
    return Craft::t('Browser');
  }

  public function getVersion() {
    return '1.0';
  }

  public function getDeveloper() {
    // Originally made by 'Jens Segers';
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

  public function init() {
    // Load in the Browser libary.
    require_once 'resources/Mobile_Detect.php';
    require_once 'resources/Agent.php';

    if (!craft()->isConsole() && !craft()->request->isCpRequest())  {
      craft()->urlManager->setRouteVariables(
        array(
          'browser' => craft()->browser,
          'check' => craft()->browser->agent,
        )
      );
    }
  }
}