<?php

namespace HudhaifaS\Assets\Extension;

use SilverStripe\Core\Extension;
use SilverStripe\Assets\File;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Dec 17, 2016 - 10:29:00 PM
 */
class FileRenameExtension extends Extension {

    public $owner;
    private static string $prefix = 'uf-';

    public function onAfterUpload(): void {
        // Build next name
        $prefix = $this->owner->config()->prefix;
        $directory = ltrim(dirname($this->owner->File->Filename), '.');
        $name = uniqid($prefix) . uniqid();
        $ext = $this->owner->getExtension();
        $filename = sprintf('%s.%s', $name, $ext);
        if ($directory !== '' && $directory !== '0') {
            $filename = File::join_paths($directory, sprintf('%s.%s', $name, $ext));
        }

        $this->owner->File->renameFile($filename);
        $this->owner->renameFile($filename);
    }

}
