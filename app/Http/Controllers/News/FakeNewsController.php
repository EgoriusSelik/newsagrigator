<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class FakeNewsController extends Controller
{
        public function __invoke(News $news)
        {
            $news->update([
                'title' => "--- FAKE NEWS !!! ---".$news->title
            ]);

            return "{ Фейк новость отмечена }";
        }
}
