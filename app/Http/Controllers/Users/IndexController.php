<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Filters\SourceFilter;
use App\Http\Requests\Users\FilterRequest;
use App\Http\Resources\Source\SourceResource;
use App\Models\Source;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(SourceFilter::class, ['queryParams' => array_filter($data)]);

        $sources = User::filter($filter)->get();

        return SourceResource::collection($sources);

    }
}
