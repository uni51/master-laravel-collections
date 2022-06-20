<?php

namespace App\Http\Controllers;


class CollectionController extends Controller
{
    public function whereNotNull()
    {
        $collection = collect([
            ['name' => 'Desk'],
            ['name' => null],
            ['name' => 'Bookcase'],
        ]);

        $filtered = $collection->whereNotNull('name');

        return $filtered->values();

        /*
            [
                ['name' => 'Desk'],
                ['name' => 'Bookcase'],
            ]
        */
    }

    public function whereNull()
    {
        $collection = collect([
            ['name' => 'Desk'],
            ['name' => null],
            ['name' => 'Bookcase'],
        ]);

        $filtered = $collection->whereNull('name');

        return $filtered->values();

        /*
            [
                ['name' => null],
            ]
        */
    }

    public function whereBetween()
    {
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 80],
            ['product' => 'Bookcase', 'price' => 150],
            ['product' => 'Pencil', 'price' => 30],
            ['product' => 'Door', 'price' => 100],
        ]);

        $filtered = $collection->whereBetween('price', [100, 200]);

        return $filtered->values();

        /*
            [
                ['product' => 'Desk', 'price' => 200],
                ['product' => 'Bookcase', 'price' => 150],
                ['product' => 'Door', 'price' => 100],
            ]
        */
    }

    public function whereNotIn()
    {
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
            ['product' => 'Bookcase', 'price' => 150],
            ['product' => 'Door', 'price' => 100],
        ]);

        $filtered = $collection->whereNotIn('price', [150, 200]);

        return $filtered->values();

        /*
            [
                ['product' => 'Chair', 'price' => 100],
                ['product' => 'Door', 'price' => 100],
            ]
        */
    }

    public function whereIn()
    {
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
            ['product' => 'Bookcase', 'price' => 150],
            ['product' => 'Door', 'price' => 100],
        ]);

        $filtered = $collection->whereNotIn('price', [150, 200]);
        /*
            [
                ['product' => 'Chair', 'price' => 100],
                ['product' => 'Door', 'price' => 100],
            ]
        */

        return $filtered->where('product', 'Chair')->pluck('price')->first();
        // 100
    }


    public function where()
    {
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
            ['product' => 'Bookcase', 'price' => 150],
            ['product' => 'Door', 'price' => 100],
        ]);

        $filtered = $collection->where('price', 100);

        return $filtered->all();
        /*
            {
                1: {
                    product: "Chair",
                    price: 100
                },
                3: {
                    product: "Door",
                    price: 100
                }
            }
         */
    }

    public function unique()
    {
        $collection = collect([1, 1, 2, 2, 3, 4, 2]);

        $unique = $collection->unique();

        return $unique->values()->all();

        // [1, 2, 3, 4]
    }

    public function keyBy()
    {
        $collection = collect([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]);

        $keyed = $collection->keyBy('product_id');

        return $keyed->all();

        /*
            {
                prod-100: {
                    product_id: "prod-100",
                    name: "Desk"
                },
                prod-200: {
                    product_id: "prod-200",
                    name: "Chair"
                }
            }
        */
    }

    public function groupBy()
    {
        $collection = collect([
            ['account_id' => 'account-x10', 'product' => 'Chair'],
            ['account_id' => 'account-x10', 'product' => 'Bookcase'],
            ['account_id' => 'account-x11', 'product' => 'Desk'],
        ]);

        $grouped = $collection->groupBy('account_id');

        return $grouped->toArray();

        /*
        {
            account-x10: [
                {
                    account_id: "account-x10",
                    product: "Chair"
                },
                {
                    account_id: "account-x10",
                    product: "Bookcase"
                }
            ],
            account-x11: [
                {
                    account_id: "account-x11",
                    product: "Desk"
                }
            ]
         }
         */
    }

    public function push()
    {
        $collection = collect([1, 2, 3, 4]);

        $collection->push(5);

        return $collection->all();

        // [1, 2, 3, 4, 5]
    }

    public function put()
    {
        $collection = collect(['product_id' => 1, 'name' => 'Desk']);

        $collection->put('price', 100);

        return $collection->all();

        // ['product_id' => 1, 'name' => 'Desk', 'price' => 100]
    }

    public function max()
    {
        return collect([['foo' => 10], ['foo' => 20]])->max('foo');

        // 20
    }

    public function min()
    {
        return collect([['foo' => 10], ['foo' => 20]])->min('foo');

        // 10
    }


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
