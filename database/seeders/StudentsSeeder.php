<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<=29;$i++){
        $student = new Student();
        $student->image ="fakeimg.png"; 
        $student->studentName = $faker->name();
        $student->fatherName = $faker->name();
        $student->courseTitle = $faker->company();
        $student->email = $faker->email();
        $student->save();
    }
    }
}
