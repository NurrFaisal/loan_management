<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Branch;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = Branch::all();

        foreach ($branches as $branch) {
            Employee::factory()->count(5)->create([
                'branch_id' => $branch->id,
            ]);
        }
    }
}