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
        $this->assertEquals('lorem', $folder->getName());
    }
}