<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grandson;
use App\Models\Son;


class GrandsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mohamed = Son::where('name','Mohamed')->first()->id;
        Grandson::Create([
            'son_id' => $mohamed,
            'name' => 'Younis',
            'birth_date' => '2022-30-08',
            'gender' => true,
        ]);
        
        $rokaia = Son::where('name','Rokaia')->first()->id;
        Grandson::Create([
            'son_id' => $rokaia,
            'name' => 'Eslam',
            'birth_date' => '2022-30-08',
            'gender' => true,
        ]);

        Grandson::Create([
            'son_id' => $rokaia,
            'name' => 'Omer',
            'birth_date' => '2022-30-08',
            'gender' => true,
        ]);
    }
}
