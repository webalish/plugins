<?php

namespace Alishplugins\Modules\Lumen;

use Alishplugins\Modules\FileRepository;

class LumenFileRepository extends FileRepository
{
    /**
     * {@inheritdoc}
     */
    protected function createModule(...$args)
    {
        return new Module(...$args);
    }
}
