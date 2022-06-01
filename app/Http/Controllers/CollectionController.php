<?php

namespace App\Http\Controllers;


class CollectionController extends Controller
{
    public function index()
    {
        $data = [
            [
                'name' => 'ahmed',
                'score' => 30,
                'exam' => [
                    'math' => '10',
                    'english' => '20'
                ]
            ],
            [
                'name' => 'ali',
                'score' => 20,
                'exam' => [
                    'math' => '12',
                    'english' => '25'
                ]
            ],
        ];
        $collection = collect($data);

        return $collection->max('exam.math');

//        $exam = array_column($data, 'exam');
//        $math = array_column($exam, 'math');
//
//        return max($math);
    }
}
