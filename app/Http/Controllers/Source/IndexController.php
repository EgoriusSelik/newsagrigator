<?php

namespace App\Http\Controllers\Source;

use App\Http\Controllers\Controller;
use App\Http\Filters\SourceFilter;
use App\Http\Requests\Source\FilterRequest;
use App\Http\Resources\Source\SourceResource;
use App\Models\Source;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(SourceFilter::class, ['queryParams' => array_filter($data)]);

        $sources = Source::filter($filter)->get();

        return SourceResource::collection($sources);

    }
}
