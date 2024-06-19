<?php

namespace App\QueryBuilders;

use App\Models\Adventure;

class AdventureQueryBuilder
{
    private $query;

    public function __construct()
    {
        $this->query = Adventure::query();
    }

    public function with($relations)
    {
        $this->query->with($relations);
        return $this;
    }

    public function get(int $perPage = null)
    {
        if ($perPage) {
            return $this->query->paginate($perPage);
        }
        return $this->query->get();
    }

    public function whereTitleOrLocationLike(string $search)
    {
        $this->query->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%');
        });
        return $this;
    }
}
