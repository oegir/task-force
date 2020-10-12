<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [
    'name' => $faker->unique()->city,
    'latitude' => $faker->latitude($min = 19, $max = 65) ,
    'longitude' => $faker->longitude($min = 47, $max = 104),
];
