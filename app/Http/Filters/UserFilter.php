<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const ID = 'id';
    public const NAME = 'name';
    public const ROLE = 'role';
    public const EMAIL = 'email';



    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::NAME => [$this, 'name'],
            self::ROLE => [$this, 'role'],
            self::EMAIL => [$this, 'email'],

        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }
    public function role(Builder $builder, $value)
    {
        $builder->where('role', 'like', "%{$value}%");
    }
    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }
}
