
<?php
return [
    'debug'  => true,
    'cache' => [
        'pages' => [
            'active' => true,
            'ignore' => function ($page) {
                return $page->slug() === 'manchettes';
            }
        ]
    ]
];

 ?>
