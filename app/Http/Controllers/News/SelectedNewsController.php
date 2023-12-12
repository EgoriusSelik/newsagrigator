<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsResource;
use App\Models\News;

class SelectedNewsController extends Controller
{
    public function __invoke()
    {
      $news = auth()->user()->news;

      return NewsResource::collection($news);
    }

}
