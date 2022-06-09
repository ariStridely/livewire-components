<?php

namespace App;

class ChartBuilder
{
    public function handle()
    {
        $chart = [
            'type' => 'bar',
            'data' => [
                'labels' =>  ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],

                'datasets' => [
                    [
                        'label' =>  '# of yes',
                        'data' =>  array_rand(range(1, 100), 6),
                        'backgroundColor' => 'green',
                        'stack' => 'stack-0'
                    ],
                    [
                        'label' =>  '# of No',
                        'data' =>  array_rand(range(1, 100), 6),
                        'backgroundColor' => 'red',
                        'stack' => 'stack-0'
                    ],
                    [
                        'label' =>  '# of astenuti',
                        'data' =>  array_rand(range(1, 100), 6),
                        'backgroundColor' => 'gray',
                        'stack' => 'stack-1'
                    ],
                ]
            ]
        ];

        return json_encode($chart);
    }
}
