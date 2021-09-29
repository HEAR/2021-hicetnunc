<?php


return [
    'debug'  => true,
    'cache' => [
        'pages' => [
            'active' => true,
            'ignore' => function() {
                return kirby()->user() !== null;
            }
        ]
    ]
];