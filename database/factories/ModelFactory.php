<?php

$factory->define(App\Tasklist::class, function(Faker\Generator $faker){
    return [
        'title'=>$faker->word,
        'user_id'=> 1
    ];
});

$factory->define(App\Task::class, function(Faker\Generator $faker){
    return [
        'title'=>$faker->word,
        'body'=> $faker->sentence(10),
        'tasklist_id'=>$faker->numberBetween(1, App\Tasklist::max('id')),
        'is_completed'=>$faker->boolean(10)
    ];
});
