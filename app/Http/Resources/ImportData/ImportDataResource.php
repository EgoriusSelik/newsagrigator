<?php

namespace App\Http\Resources\ImportData;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImportDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author


        ];
    }
}
