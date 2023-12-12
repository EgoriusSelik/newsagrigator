<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Filters\NewsFilter;
use App\Http\Requests\News\FilterRequest;
use App\Http\Resources\News\NewsResource;
use App\Models\News;

class FeedController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(NewsFilter::class, ['queryParams' => array_filter($data)]);
        $news = News::filter($filter)->where('is_published',1)->get();


        return NewsResource::collection($news);
    }

}
