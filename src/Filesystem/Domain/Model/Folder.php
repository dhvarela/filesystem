<?php
declare(strict_types=1);

namespace App\Filesystem\Domain\Model\Folder;

class Folder
{
    /** @var FolderId */
    private $id;

    /** @var FolderName */
    private $name;

    public function __construct(FolderId $id, FolderName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function init($name)
    {
        $id = FolderId::random();
        $name = new FolderName($name);

        return new static($id, $name);
    }

    public function id(): FolderId
    {
        return $this->id;
    }

    public function getName(): FolderName
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->id->value();
    }
}