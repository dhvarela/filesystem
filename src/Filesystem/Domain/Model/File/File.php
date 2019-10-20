<?php
declare(strict_types=1);

namespace App\Filesystem\Domain\Model\File;

use App\Filesystem\Domain\Model\Folder\FolderId;

class File
{
    /** @var FileId */
    private $id;
    /** @var FolderId */
    private $parent;
    /** @var FileName */
    private $name;
    /** @var FileContent */
    private $content;

    public function __construct(FileId $id, FileName $name, FileContent $content)
    {
        $this->id = $id;
        $this->name = $name;
        $this->content = $content;
    }

    public static function init($name, $content)
    {
        $id = FileId::random();
        $name = new FileName($name);
        $content = new FileContent($content);

        return new static($id, $name, $content);
    }

    public function id(): FileId
    {
        return $this->id;
    }

    public function parent(): FolderId
    {
        return $this->parent;
    }

    public function name(): FileName
    {
        return $this->name;
    }

    public function content(): FileContent
    {
        return $this->content;
    }

    /**
     * This method should be private to avoid data inconsistency. We should use a Domain Event in addFile method from
     * Folder class to fix it.
     * @param FolderId $parent
     */
    public function setParent(FolderId $parent)
    {
        $this->parent = $parent;
    }
}