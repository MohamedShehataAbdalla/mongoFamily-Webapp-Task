<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grandparent;
use App\Models\Son;

class SonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grandparent = Grandparent::where('name','Shehata')->first()->id;
        Son::Create([
            'grandparent_id' => $grandparent,
            'name' => 'Mohamed',
            'birth_date' => '1995-14-03',
            'gender' => true,
        ]);
        Son::Create([
            'grandparent_id' => $grandparent,
            'name' => 'Rokaia',
            'birth_date' => '1993-07-03',
            'gender' => false,
        ]);
    }
}
