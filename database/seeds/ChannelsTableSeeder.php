<?php

use Illuminate\Database\Seeder;
use App\Channel;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 7',
            'slug' => Str::slug('Laravel 7', '-')
        ]);

         Channel::create([
            'name' => 'Mongo DB',
            'slug' => Str::slug('Mongo DB', '-')
        ]);

        Channel::create([
            'name' => 'Vue js',
            'slug' => Str::slug('Vue js', '-')
        ]);

        Channel::create([
            'name' => 'Node js',
            'slug' => Str::slug('MongoDB Node js', '-')
        ]);
    }
}
