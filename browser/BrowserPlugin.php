<?php
namespace Craft;

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
    Craft::import('plugins.browser.twigextensions.browser_globals');
    return array(
      new browser_globals()
    );
  }

  public function init() {
    // Load in the Browser libary.
    require_once 'resources/Mobile_Detect.php';
    require_once 'resources/Agent.php';
  }
}
