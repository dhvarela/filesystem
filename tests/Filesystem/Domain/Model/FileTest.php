<?php
declare(strict_types=1);

use App\Filesystem\Domain\Model\File\File;
use App\Filesystem\Domain\Model\Folder\Folder;
use App\Filesystem\Domain\Model\File\FileNameAlreadyExists;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    /** @test */
    public function test_should_instantiate_an_empty_file_with_an_id_a_name_and_a_content(): void
    {
        $file = File::init('Alfa', 'lorem ipsum dolor sit amet');

        $this->assertNotEmpty($file->id());
        $this->assertEquals('Alfa', $file->name());
        $this->assertEquals('lorem ipsum dolor sit amet', $file->content());
    }

    /** @test */
    public function test_should_add_a_file_into_a_folder(): void
    {
        $file = File::init('Alfa', 'lorem ipsum dolor sit amet');
        $folder = Folder::init('books');

        $folder->addFile($file);

        $this->assertEquals(1, $folder->totalFiles());
        $this->assertEquals($folder, $file->parent());
    }

    /** @test */
    public function test_should_fail_adding_an_existing_file_name(): void
    {
        $folder = Folder::init('books');
        $file1 = File::init('Alfa', 'lorem ipsum dolor sit amet');
        $file2 = File::init('Alfa', 'lorem ipsum dolor sit amet');

        $this->expectException(FileNameAlreadyExists::class);

        $folder->addFile($file1);
        $folder->addFile($file2);
    }
}