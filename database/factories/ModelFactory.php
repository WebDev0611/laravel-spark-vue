<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$user = factory(App\Quote::class)->create([
	'beam'=> [
	   "beamSpliceHardware"=> "false",
	   "beamToBeamDistance"=> "0",
	   "cantilever"=> "true",
	   "cantileverLength"=> "1.5",
	   "lengths"=> "1@20",
	   "maxSpan"=> "17",
	   "multiBeam"=> "false",
	   "numBeamSplice"=> "0",
	   "numberOfBeams"=> '1',
	   "part"=> "P201",
	   "price"=> "152.00",
	   "totalLength"=> "20",
	   "tributaryWidth"=> "4",
	   "type"=> "7in C Beam",
	   "wallToBeamDistance"=> "7"
	],
	'description'=> 'You have entered testing mode',
	'fascia'=> [
	   "numberOfPieces"=> "0",
	   "part"=> "x",
	   "price"=> "0.00"
	],
	'gutter'=> [
	   "numberOfPieces"=> "2@30",
	   "part"=> "P240",
	   "price"=> "168.00"
	],
	'hardware'=> [
	   "beamToFasciaHardware"=> "true",
	   "panelToBeamScrews"=> "false",
	   "price"=> "90.60",
	   "screwsSealantScuppersPaintEtc"=> "true",
	   "tarTape"=> "false"
	],
	'header'=> [
	   "numberOfPieces"=> "0",
	   "part"=> "",
	   "price"=> "0.00"
	],
	'id'=> "0",
	'panel'=> [
	   "maxSpan"=> "7",
	   "numberOfPanels"=> "30.0",
	   "overhang"=> "1",
	   "pansToSpan"=> "7",
	   "part"=> "P142",
	   "price"=> "480.00",
	   "secondary_overhang"=> "0",
	   "type"=> "3x8 24Ga. Galvalume Pan"
	],
	'param'=> [
	   "color"=> [
	       "beam"=> "0",
	       "fascia"=> "0",
	       "panel"=> "0",
	       "post"=> "0"
	   ],
	   "dimensions"=> [
	       "overhang"=> "12",
	       "projection"=> "96",
	       "wallHeight"=> "96",
	       "width"=> "240"
	   ],
	   "load"=> [
	       "mph"=> "150",
	       "psf"=> "10"
	   ],
	   "options"=> [
	       "fanBeam"=> "0",
	       "mode"=> "test",
	       "numPosts"=> "2",
	       "panelType"=> "1",
	       "postAttached"=> "true",
	       "wallAttached"=> "true",
	       "zipcode"=> "90210"
	   ]
	],
	'post'=> [
	   "bottomBracket"=> "true",
	   "bottomBracketPrice"=> "17.00",
	   "length"=> "8",
	   "numberOfPosts"=> "2",
	   "part"=> "P329",
	   "postsPerBeam"=> "2",
	   "price"=> "110.08",
	   "topBracket"=> "true",
	   "topBracketPrice"=> "5.50",
	   "type"=> "3x3x0.125 Tube"
	],
	'price'=> "1023.00",
	'status'=> "this is a status",
	'title'=> "Test Mode",
	'version'=> "0.1a"
]);

// $factory->define(App\Quotes=>=>class, function (Faker $faker) [
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'meta' => [
//             "gender" => $faker->randomElement(['Male', 'Female']),
//             "country" => $faker->country,
//             "bio" => [
//                 "summery" => $faker->realText(),
//                 "full" => $faker->realText(800)
//             ],
//             "skills" => $faker->randomElements(["PHP", "Laravel", "MySQL", "VueJS", "JavaScript"], rand(2,4))
//         ],
//         'password' => $password ?=> $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// ]);