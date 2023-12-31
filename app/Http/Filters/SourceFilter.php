<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class SourceFilter extends AbstractFilter
{
    public const ID = 'id';
    public const NAME = 'name';



    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::NAME => [$this, 'name'],

        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }
}
