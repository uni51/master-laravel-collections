<?php

namespace App\Http\Controllers;


class CollectionController extends Controller
{
    public function sortBy()
    {
        $collection = collect([
            ['name' => 'Desk', 'colors' => ['Black', 'Mahogany']],
            ['name' => 'Chair', 'colors' => ['Black']],
            ['name' => 'Bookcase', 'colors' => ['Red', 'Beige', 'Brown']],
        ]);

        $sorted = $collection->sortBy(function ($product, $key) {
            return count($product['colors']);
        });

        return $sorted->values()->all();

        /*
            [
                {
                    name: "Chair",
                    colors: [
                        "Black"
                    ]
                },
                {
                    name: "Desk",
                    colors: [
                        "Black",
                        "Mahogany"
                    ]
                },
                {
                    name: "Bookcase",
                    colors: [
                        "Red",
                        "Beige",
                        "Brown"
                    ]
                }
            ]
        */
   }

    public function sort()
    {
        $collection = collect([5, 3, 1, 2, 4]);

        $sorted = $collection->sort();

        return $sorted->values()->all();

        // [1, 2, 3, 4, 5]
    }

    public function last()
    {
        return collect([1, 2, 3, 4])->last(function ($value, $key) {
            return $value < 3;
        });

        // 2
    }

    public function first()
    {
        return collect([1, 2, 3, 4])->first(function ($value, $key) {
            return $value > 2;
        });

        // 3
    }

    public function skipWhile()
    {
        $collection = collect([1, 2, 3, 4]);

        $subset = $collection->skipWhile(function ($item) {
            return $item <= 3;
        });

        return $subset->values();

        // [4]
    }

    public function skipUntil()
    {
        $data = collect([
            1,
            2,
            3,
            4,
            5, // skip until stop working true
            3
        ]);

        return $data->skipUntil(function ($item) {
           return $item > 4;
        });
        /**
         *
         {
            4: 5,
            5: 3
         }
         */
    }

    public function skip()
    {
        $data = collect([
            1,
            2,
            3,
            4,
            5,
            3
        ]);

        return $data->skip(2)->values();
        /**
         *
        [
         3,
         4,
         5,
         3
        ]
         */
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function reject()
    {
        $data = collect([
            [
                'score' => 10,
                'ids' => [1, 2, 3],
            ],
            [
                'score' => 12,
                'ids' => [1, 2, 3, 4],
            ],
            [
                'score' => 50,
                'ids' => [1, 2, 3, 4, 5, 6],
            ],
        ]);

        /**
         *
         [
            {
                "score": 10,
                "ids": [1, 2, 3]
             }
         ]
         */
        return $data->reject(function($item){
            return count($item['ids']) > 3;
        })->values();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function filter()
    {
        $data = collect([
            [
                'score' => 10,
                'ids' => [1, 2, 3],
            ],
            [
                'score' => 12,
                'ids' => [1, 2, 3, 4],
            ],
            [
                'score' => 50,
                'ids' => [1, 2, 3, 4, 5, 6],
            ],
        ]);

        /**
         * [
            {
                score: 12,
                ids: [1, 2, 3, 4]
            },
            {
                score: 50,
                ids: [1, 2, 3, 4, 5, 6 ]
            }
          ]
         */
        return $data->filter(function($item){
            return count($item['ids']) > 3;
        })->values();
    }

    /**
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

        // 2より大きい3の値は２つあるので、[2]が返る
        return $data->countBy(function ($val) {
            return $val > 2;
        })->unique(); // [2]
    }


    /**
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
