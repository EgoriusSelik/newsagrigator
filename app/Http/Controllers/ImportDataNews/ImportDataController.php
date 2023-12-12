<?php

namespace App\Http\Controllers\ImportDataNews;

use App\Componets\ImportDataNewsToDatabase;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportData\ImportDataRequest;
use App\Http\Resources\ImportData\ImportDataResource;
use App\Models\News;
use App\Models\Source;


class ImportDataController extends Controller
{
    public function __invoke(ImportDataRequest $request)
    {
        $request = $request->validated()['search_title'];

        $import = new ImportDataNewsToDatabase();

        $response = $import->client->request('GET',"/v2/everything?q=$request&language=ru&apiKey=c441a3f4d129424a9081f6c3b9a8bd25");
        $data = json_decode($response->getBody()->getContents())->articles;

        $nowNews = [];
        foreach ($data as $item){
            if ($item->description === null or $item->author === null or $item->title === null or $item->content === null){
                continue;
            }

            $source = Source::firstOrCreate([
                'name'=> $item->source->name
            ],[
                'name'=> $item->source->name
            ]);


            $nowNews[] = News::firstOrCreate([
                'title'=> $item->title
            ], [
                'title'=> $item->title,
                'description'=> $item->description,
                'author'=> $item->author,
                'content'=> $item->content,
                'source_id' => $source->id
            ]);
        }

        return ImportDataResource::collection($nowNews);
    }
}
