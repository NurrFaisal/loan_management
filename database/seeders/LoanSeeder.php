<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Somitee;
use App\Models\Day;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = Member::all();
        $somitees = Somitee::all();
        $days = Day::all();

        foreach ($members as $member) {
            foreach ($somitees as $somitee) {
                foreach ($days as $day) {
                    Loan::factory()->count(2)->create([
                        'member_id' => $member->id,
                        'somitee_id' => $somitee->id,
                        'day_id' => $day->id,
                    ]);
                }
            }
        }
    }
}