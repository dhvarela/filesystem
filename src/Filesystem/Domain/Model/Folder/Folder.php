<?php
declare(strict_types=1);

namespace App\Filesystem\Domain\Model\Folder;

use App\Filesystem\Domain\Model\File\File;

class Folder
{
    /** @var FolderId */
    private $id;

    /** @var FolderId */
    private $parent;

    /** @var FolderName */
    private $name;

    /** @var array */
    private $folders;

    /** @var array */
    private $files;

    public function __construct(FolderId $id, FolderName $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->folders = array();
        $this->files = array();
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

    public function parent(): FolderId
    {
        return $this->parent;
    }

    public function folders(): array
    {
        return $this->folders;
    }

    public function files(): array
    {
        return $this->files;
    }

    public function addFolder(Folder $child)
    {
        /** @var Folder $aFolder */
        foreach ($this->folders as $aFolder) {
            if ($aFolder->name()->value() === $child->name()->value()) {
                FolderNameAlreadyExists::throwBecauseOf($child->name());
            }
        }

        $this->folders[$child->id()->value()] = $child;
        $child->setParent($this->id());
    }

    public function addFile(File $file)
    {
        $this->files[$file->id()->value()] = $file;
        // TODO - setParent should be a private method in File class
        $file->setParent($this->id());
    }

    public function totalFolders()
    {
        return count($this->folders);
    }

    public function totalFiles()
    {
        return count($this->files);
    }

    /** This method is only used when a child folder is added into parent folder to ensure the new relation
     * @param FolderId $parent
     */
    private function setParent(FolderId $parent): void
    {
        $this->parent = $parent;
    }

    public function __toString()
    {
        return $this->id->value();
    }
}