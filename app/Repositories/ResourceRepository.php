<?php

namespace App\Repositories;

use App\Models\Resource;

class ResourceRepository extends BaseRepository
{
    public function __construct(Resource $resource)
    {
        parent::__construct($resource);
    }
}

?>