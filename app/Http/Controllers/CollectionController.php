<?php

namespace App\Http\Controllers;


class CollectionController extends Controller
{
    public function index()
    {
        $data = collect([
            [
                'name' => 'Ahmed',
                'age' => 23,
                'exam' => [
                    'result' => 10
                ]
            ],
            [
                'name' => 'Ali',
                'age' => 21,
                'exam' => [
                    'result' => 20
                ]
            ]
        ]);

        return $data->avg('exam.result');
    }
}
