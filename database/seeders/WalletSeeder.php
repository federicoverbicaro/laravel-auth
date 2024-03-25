<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Faker\Generator as Faker;

use App\Models\Wallet;

use Illuminate\Support\Str;


class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker ): void
    {
        for($i = 0; $i < 10; $i++){
            $wallet = new Wallet();

            $wallet->title = $faker->sentence(2);
            $wallet->description = $faker->paragraph();
            $wallet->image = $faker->imageUrl($width = 640, $height = 480);
            $wallet->category = $faker->word();
            $wallet->client = $faker->company();
            $wallet->date = $faker->date();
            $wallet->url = $faker->url();
            $wallet->slug = Str::slug($wallet->title, '-');

            $wallet->save();
        };
    }
}
