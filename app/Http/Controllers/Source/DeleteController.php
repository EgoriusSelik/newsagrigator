<?php

namespace App\Http\Controllers\Source;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Source $source)
    {
        $source->delete();

        return "{ Источник удален }";
    }
}
