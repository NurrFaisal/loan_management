<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Somitee;
use App\Models\Day;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $somitees = Somitee::all();
        $days = Day::all();

        foreach ($somitees as $somitee) {
            foreach ($days as $day) {
                Member::factory()->count(5)->create([
                    'somitee_id' => $somitee->id,
                    'day_id' => $day->id,
                ]);
            }
        }
    }
}