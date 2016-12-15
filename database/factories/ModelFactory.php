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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Local::class, function (Faker\Generator $faker) {

    return [
        'local' => $faker->city,
    ];
});

$factory->define(App\Tipo::class, function (Faker\Generator $faker) {

    return [
        'tipo' => $faker->firstNameFemale,
    ];
});

$factory->define(App\Projeto::class, function (Faker\Generator $faker) {

    return [
        'projeto' => $faker->firstNameMale,
    ];
});

$factory->define(App\Patrimonio::class, function (Faker\Generator $faker) {

    return [
		'patrimonio' => $faker->name,
		'plq_ufc' => $faker->randomNumber, 
		'plq_dc' => $faker->randomNumber,
		'plq_fcpc' => $faker->randomNumber,
		'plq_great' => $faker->randomNumber,
		'status_emprestimo' => $faker->numberBetween(0,1),
		'status_uso' => $faker->numberBetween(0,1),
		'descricao' => $faker->text,
	    'tipo_id' => $faker->numberBetween(1,4),
	    'local_id' => $faker->numberBetween(1,4),
	    'projeto_id' => $faker->numberBetween(1,4),
    ];
});


$factory->define(App\Emprestimo::class, function (Faker\Generator $faker) {

    return [
		'data_prevista' => $faker->dateTime('now'),
		'data_devolucao' => $faker->dateTime('now'),
		'data_emprestimo' => $faker->dateTime('now'),
		'solicitante' => $faker->name,
		'email_solicitante' => $faker->freeEmail,
		'patrimonio_id' => $faker->numberBetween(1,4),
		'local_id' => $faker->numberBetween(1,4),
    ];
});


$factory->define(App\Historico::class, function (Faker\Generator $faker) {
    return [

    	'data_movimentacao' => $faker->dateTime('now'),
        'patrimonio_id' => $faker->numberBetween(1,4),
        'origem_id' => $faker->numberBetween(1,4),
        'destino_id' => $faker->numberBetween(1,4),
    ];
});
