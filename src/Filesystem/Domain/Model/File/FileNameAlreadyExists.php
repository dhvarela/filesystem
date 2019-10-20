<?php
declare(strict_types = 1);

namespace App\Filesystem\Domain\Model\File;

use OverflowException;

class FileNameAlreadyExists extends OverflowException
{
    public static function throwBecauseOf(FileName $name)
    {
        throw new self(sprintf("The file name %s is already used in this folder", $name));
    }
}