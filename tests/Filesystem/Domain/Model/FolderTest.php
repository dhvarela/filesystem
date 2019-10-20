<?php
declare(strict_types=1);

use App\Filesystem\Domain\Model\Folder\Folder;
use PHPUnit\Framework\TestCase;

class FolderTest extends TestCase
{
    /** @test */
    public function test_should_instantiate_an_empty_folder_with_an_id(): void
    {
        $cart = Folder::init();
        $this->assertNotEmpty($cart->id());
    }
}