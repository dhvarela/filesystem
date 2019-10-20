<?php
declare(strict_types=1);

namespace App\Filesystem\Domain\Model\Folder;

class Folder
{
    /** @var FolderId */
    private $id;

    /** @var Folder */
    private $parent;

    /** @var FolderName */
    private $name;

    /** @var Folder array */
    private $folders;

    public function __construct(FolderId $id, FolderName $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->folders = array();
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

    public function name(): FolderName
    {
        return $this->name;
    }

    public function getParent(): Folder
    {
        return $this->parent;
    }

    public function addFolder(Folder $child)
    {
        $child->setParent($this);
        $this->folders[$child->id()->value()] = $child;
    }

    public function totalFolders()
    {
        return count($this->folders);
    }

    /** This method is only used when a child folder is added into parent folder to ensure the new relation
     * @param Folder $parent
     */
    private function setParent(Folder $parent): void
    {
        $this->parent = $parent;
    }

    public function __toString()
    {
        return $this->id->value();
    }
}