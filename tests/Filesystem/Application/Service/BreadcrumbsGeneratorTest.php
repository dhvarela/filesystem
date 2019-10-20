<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Filesystem\Domain\Model\Folder\Folder;
use App\Filesystem\Application\Service\Breadcrumbs\BreadcrumbsGenerator;

class BreadcrumbsGeneratorTest extends TestCase
{
    /** @test */
    public function test_should_generate_a_breadcrumb_with_one_depth_level(): void
    {
        $folder = Folder::init('vehicles');

        $generator = new BreadcrumbsGenerator();

        $breadcrumbs = $generator->__invoke($folder);

        $this->assertEquals('vehicles', $breadcrumbs);
    }

    /** @test */
    public function test_should_generate_a_breadcrumb_with_three_depth_level(): void
    {
        $folder = Folder::init('vehicles');
        $subfolder1 = Folder::init('cars');
        $subfolder2 = Folder::init('trucks');
        $subsubfolder = Folder::init('Mercedes');

        $subfolder2->addFolder($subsubfolder);

        $folder->addFolder($subfolder1);
        $folder->addFolder($subfolder2);

        $generator = new BreadcrumbsGenerator();

        $breadcrumbs = $generator->__invoke($subsubfolder);

        $this->assertEquals('vehicles > trucks > Mercedes', $breadcrumbs);
    }
}