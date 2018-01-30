<?php
/**
 * Browser plugin for Craft CMS 3.x
 *
 * Query the server-side information from the users agent data.
 *
 * @link      https://github.com/marknotton/
 * @copyright Copyright (c) 2018 Mark Notton
 */

namespace marknotton\browser\variables;

use marknotton\browser\Browser;

use Craft;


class BrowserVariable {

  // Returns array
  public function full() {
    return Browser::$plugin->browserService->full();
  }

  // Returns string
  public function data() {
    return Browser::$plugin->browserService->data();
  }


	public function session() {
    return Browser::$plugin->browserService->session();
  }

  public function is($agent = null, $version = null, $condition = null) {
    return Browser::$plugin->browserService->is($agent, $version, $condition);
  }
}
