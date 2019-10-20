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

        $i = 0;
        while($currentFolder->parent() !== null && $i < self::MAX_ITEMS) {

            $breadcrumbs = " > " . $currentFolder->name() . $breadcrumbs;
            $currentFolder = $currentFolder->parent();

            $i++;
        }

        $breadcrumbs = $currentFolder->name() . $breadcrumbs;

        return $breadcrumbs;
    }
}