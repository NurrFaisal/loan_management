<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => 'Main Branch',
            'address' => '123 Main St',
            'manager_id' => null,
        ]);

        Branch::create([
            'name' => 'Downtown Branch',
            'address' => '456 Oak Ave',
            'manager_id' => null,
        ]);
    }
}