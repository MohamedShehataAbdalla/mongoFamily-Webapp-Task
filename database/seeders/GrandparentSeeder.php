<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grandparent;
use App\Models\User;

class GrandparentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name','Shehata')->first()->id;
        Grandparent::Create([
            'user_id' => $user,
            'name' => 'Shehata',
            'birth_date' => '1992-01-01',
            'gender' => true,
        ]);
        
    }
}
