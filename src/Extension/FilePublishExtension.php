<?php

namespace HudhaifaS\Assets\Extension;

use SilverStripe\Core\Extension;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Dec 17, 2016 - 10:29:00 PM
 */
class FilePublishExtension extends Extension {

    public $owner;
    public function onAfterUpload(): void {
        $this->owner->publishRecursive();
    }

}
