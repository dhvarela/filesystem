<?php
declare(strict_types=1);

namespace App\Filesystem\Domain\Model\File;

use App\Filesystem\Domain\Model\Folder\FileContent;
use App\Filesystem\Domain\Model\Folder\FileName;

class File
{
    /** @var FileId */
    private $id;
    /** @var FileId */
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

    public function parent(): FileId
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
}