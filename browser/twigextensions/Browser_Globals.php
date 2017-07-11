<?php
namespace Craft;

use Twig_Extension;

class Browser_Globals extends \Twig_Extension {

  public function getName() {
    return Craft::t('Browser Globals');
  }

  public function getGlobals() {
    return craft()->plugins->getPlugin('browser')->getGlobals();
  }
}
