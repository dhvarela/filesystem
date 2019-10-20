<?php
declare(strict_types=1);

use App\Filesystem\Domain\Model\Folder\Folder;
use PHPUnit\Framework\TestCase;

class FolderTest extends TestCase
{
    /** @test */
    public function test_should_instantiate_an_empty_folder_with_an_id_and_name(): void
    {
        $folder = Folder::init('lorem');

        $this->assertNotEmpty($folder->id());
        $this->assertEquals('lorem', $folder->name());
    }

    /** @test */
    public function test_should_create_a_new_folder_with_parent_folder(): void
    {
        $vehiclesFolder = Folder::init('vehicles');
        $carFolder = Folder::init('vehicles');
        $vehiclesFolder->addFolder($carFolder);

        $this->assertEquals(1, $vehiclesFolder->totalFolders());
        $this->assertEquals($vehiclesFolder, $carFolder->getParent());
    }
}