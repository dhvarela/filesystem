<?php
declare(strict_types=1);

namespace App\Filesystem\Domain\Model\Folder;

class Folder
{
    /** @var FolderId */
    private $id;

    public function __construct(FolderId $id)
    {
        $this->id = $id;
    }

    public static function init()
    {
        $id = FolderId::random();

        return new static($id);
    }

    public function id(): FolderId
    {
        return $this->id;
    }
}