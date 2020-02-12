<?php

use Illuminate\Database\Seeder;
use App\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Teacher::create([
        	'nis' => 123456,
        	'name' => 'Dobleh',
        	'jk' => 'L', 
        ]);
        Teacher::create([
        	'nis' => 789456,
        	'name' => 'Jamal',
        	'jk' => 'L', 
        ]);
    }
}
