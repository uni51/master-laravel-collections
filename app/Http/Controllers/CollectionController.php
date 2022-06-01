<?php

namespace App\Http\Controllers;


class CollectionController extends Controller
{
    /**
     * https://laravel.com/docs/9.x/collections#method-count
     *
     * @return \Illuminate\Support\Collection
     */
    public function countBy()
    {
        $data = collect([
            1,
            2,
            3,
            3,
        ]);

        // 2より大きい3の値は２つあるので、2が返る
        return $data->countBy(function ($val) {
            return $val > 2;
        })->unique();
    }


    /**
     * https://laravel.com/docs/9.x/collections#method-count
     *
     * @return mixed
     */
    public function count()
    {
        $data = collect([
            [
                'name' => 'ball',
                'colors' => ['green', 'blue']
            ],
            [
                'name' => 'mouse',
                'colors' => ['red']
            ],
        ]);

        return $data->sum(function ($val) {
            return count($val['colors']);
        });
    }

    /**
     * https://laravel.com/docs/9.x/collections#method-sum
     *
     * @return mixed
     */
    public function sum()
    {
        $data = collect([
            [
                'name' => 'ahmed',
                'age' => 22,
                'exam' => [
                    'result' => 20
                ]
            ],
            [
                'name' => 'ali',
                'age' => 20,
                'exam' => [
                    'result' => 30
                ]
            ],
        ]);

        return $data->sum('exam.result');
    }

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

        return $data->contains(function ($val) {
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
