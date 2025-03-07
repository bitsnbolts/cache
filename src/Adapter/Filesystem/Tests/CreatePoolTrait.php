<?php

/*
 * This file is part of php-cache organization.
 *
 * (c) 2015 Aaron Scherer <aequasi@gmail.com>, Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Cache\Adapter\Filesystem\Tests;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemOperator;
use League\Flysystem\Local\LocalFilesystemAdapter;

trait CreatePoolTrait
{
    /**
     * @type FilesystemOperator
     */
    private $filesystem;

    public function createCachePool()
    {
        return new FilesystemCachePool($this->getFilesystem());
    }

    public function createSimpleCache()
    {
        return $this->createCachePool();
    }

    private function getFilesystem()
    {
        if ($this->filesystem === null) {
            $this->filesystem = new Filesystem(new LocalFilesystemAdapter(__DIR__.'/cache'.rand(1, 100000)));
        }

        return $this->filesystem;
    }
}
