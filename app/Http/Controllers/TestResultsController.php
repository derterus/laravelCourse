<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestResultsController extends Controller
{
    public function index()
    {
        // Прочитайте результаты из файла
        $output = Storage::get('tests.txt');

        // Верните результаты в виде представления
        return view('test-results', ['results' => nl2br($output)]);
    }
}
