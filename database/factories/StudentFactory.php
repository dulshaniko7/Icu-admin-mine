<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Student;
use Illuminate\Support\Arr;


$suffix = [
    'College',
    'School',

];

$factory->define(Student::class, function (Faker $faker) use ($suffix) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'contact' => $faker->phoneNumber,
        'school_name' => $faker->word . ' ' . Arr::random($suffix)
    ];
});
