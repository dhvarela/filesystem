<?php
declare(strict_types=1);

use App\Filesystem\Domain\Model\File\File;
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
}