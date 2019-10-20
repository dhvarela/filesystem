<?php
declare(strict_types = 1);

namespace App\Filesystem\Domain\Model\Folder;

use OverflowException;

class FolderNameAlreadyExists extends OverflowException
{
    public static function throwBecauseOf(FolderName $name)
    {
        throw new self(sprintf("The folder name %s is already used in this folder", $name));
    }
}