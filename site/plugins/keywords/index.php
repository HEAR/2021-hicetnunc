<?php 

// hearCG/keywords plugin
// from Loïc Horellou

// https://getkirby.com/docs/guide/routing
// https://forum.getkirby.com/t/using-snippet-in-route-inside-plugin/20325/6

Kirby::plugin('hearCG/keywords', [
	'routes' => function ($kirby){
		return [
			[
				'pattern' => 'keyword/(:any)',
				// 'language' => '*',
				// 'page' => 'profile',
				'action'  => function ($any) use ($kirby) {

					// $user = $kirby->user( $alphanum );

					// if(!empty( $user )) :

						return new Page([
							'template' => 'keyword',
							'slug' => "keyword/$any",
							'content' => [
								'title' 	=> "Mot clef : ". urldecode($any),
								'url' 		=> 'keyword/' . $any,
								'keyword'	=> urldecode($any),
							]
						]);

					// else :

					// 	return new Page([
					// 		'template' => 'person',
					// 		'slug' => "person/usererror",
					// 		'content' => [
					// 			'title' 	=> 'This keyword does not exist',
					// 			'url' 		=> 'person/usererror',
					// 		]
					// 	]);

					// endif;
				}
			]
		];
	}
])

 ?>