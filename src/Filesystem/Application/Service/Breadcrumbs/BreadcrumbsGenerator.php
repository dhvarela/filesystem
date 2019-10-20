<?php
declare(strict_types=1);

namespace App\Filesystem\Application\Service\Breadcrumbs;

use App\Filesystem\Domain\Model\Folder\Folder;

class BreadcrumbsGenerator
{
    const MAX_ITEMS = 15;

    public function __invoke(Folder $folder): string
    {
        $breadcrumbs = '';
        $currentFolder = $folder;

        while($currentFolder->parent() !== null) {

            $breadcrumbs = " > " . $folder->name() . $breadcrumbs;
            $currentFolder = $folder->parent();

        }

        $breadcrumbs = $currentFolder->name() . $breadcrumbs;

        return $breadcrumbs;
    }
}