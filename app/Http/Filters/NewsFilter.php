<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class NewsFilter extends AbstractFilter
{
    public const ID = 'id';
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const AUTHOR = 'author';


    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::AUTHOR => [$this, 'author'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }
    public function author(Builder $builder, $value)
    {
        $builder->where('author', 'like', "%{$value}%");
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }
}
