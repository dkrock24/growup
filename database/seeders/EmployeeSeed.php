<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'first_name' => "Rafael",
            'last_name' => "Rafael",
            'age' => 30,
            'salary' => 500,
            'schedule' => 8,
            'email' => "a@demo.com",
        ]); 
          
    }
}
