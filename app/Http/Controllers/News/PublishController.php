<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\PublishRequest;
use App\Models\News;

class PublishController extends Controller
{
    public function __invoke(PublishRequest $request)
    {
        $request = $request->validated()['news_id'];

        foreach ($request as $elem){
            $news = News::where('id',$elem)->first();
            $news->update([
                'is_published' => 1
            ]);
        }
        return "{ Новости опубликованы }";
    }
}
