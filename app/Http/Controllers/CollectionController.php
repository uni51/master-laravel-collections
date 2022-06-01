<?php

namespace App\Http\Controllers;


class CollectionController extends Controller
{
    /**
     * https://laravel.com/docs/9.x/collections#method-contains
     *
     * @return bool
     */
    public function contains()
    {
        $data = collect([
            [
                'name' => 'ahmed',
                'age' => 25
            ],
            [
                'name' => 'ali',
                'age' => 23
            ],
        ]);

        return $data->contains(function($val){
            return $val['age'] < 30;
        });
    }

    /**
     * https://laravel.com/docs/9.x/collections#method-avg
     *
     * @return float|int|mixed
     */
    public function average()
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
