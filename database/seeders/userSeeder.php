<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'tung2912',
            'password'=>Hash::make('123456'),
            'email'=>'tung29121990@gmail.com',
            'role_id'=>'1'
            ]);
    }
}
