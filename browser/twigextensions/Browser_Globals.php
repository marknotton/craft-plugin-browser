<?php
namespace Craft;

use Twig_Extension;

class Browser_Globals extends \Twig_Extension {

  public function getName() {
    return Craft::t('Browser Globals');
  }

  public function getGlobals() {
    $globals = array(
      'browser' => craft()->browser,
      'local' => ($_SERVER['REMOTE_ADDR']=='127.0.0.1'),
    );

    return $globals;
  }
}
