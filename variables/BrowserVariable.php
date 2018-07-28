<?php
namespace Craft;
class BrowserVariable {
  public function full() {
    return craft()->browser->full();
  }

  public function data() {
    return craft()->browser->data();
  }

	public function session() {
    return craft()->browser->session();
  }

  public function is($agent = null, $version = null, $condition = null) {
    return craft()->browser->is($agent, $version, $condition);
  }
}
