<?php

namespace App\Http\Controllers;

use App\Models\SomiteeDay;
use Illuminate\Http\Request;

class SomiteeDayController extends Controller
{
    public function index()
    {
        $somiteeDays = SomiteeDay::withCount('somitees')->orderBy('weekday')->get();
        return view('somitee_days.index', compact('somiteeDays'));
    }

    public function create()
    {
        $weekdays = SomiteeDay::getWeekdays();
        return view('somitee_days.create', compact('weekdays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'weekday' => 'required|string|max:20|unique:somitee_days,weekday',
            'collection_time' => 'nullable|date_format:H:i',
            'is_active' => 'boolean',
            'description' => 'nullable|string|max:1000'
        ]);

        SomiteeDay::create([
            'weekday' => $request->weekday,
            'collection_time' => $request->collection_time,
            'is_active' => $request->has('is_active'),
            'description' => $request->description
        ]);

        return redirect()->route('somitee_days.index')
                         ->with('success', 'Somitee day created successfully!');
    }

    public function show(SomiteeDay $somiteeDay)
    {
        $somiteeDay->load('somitees');
        return view('somitee_days.show', compact('somiteeDay'));
    }

    public function edit(SomiteeDay $somiteeDay)
    {
        $weekdays = SomiteeDay::getWeekdays();
        return view('somitee_days.edit', compact('somiteeDay', 'weekdays'));
    }

    public function update(Request $request, SomiteeDay $somiteeDay)
    {
        $request->validate([
            'weekday' => 'required|string|max:20|unique:somitee_days,weekday,' . $somiteeDay->id,
            'collection_time' => 'nullable|date_format:H:i',
            'is_active' => 'boolean',
            'description' => 'nullable|string|max:1000'
        ]);

        $somiteeDay->update([
            'weekday' => $request->weekday,
            'collection_time' => $request->collection_time,
            'is_active' => $request->has('is_active'),
            'description' => $request->description
        ]);

        return redirect()->route('somitee_days.index')
                         ->with('success', 'Somitee day updated successfully!');
    }

    public function destroy(SomiteeDay $somiteeDay)
    {
        if ($somiteeDay->somitees()->count() > 0) {
            return redirect()->route('somitee_days.index')
                             ->with('error', 'Cannot delete this day as it has associated somitees!');
        }

        $somiteeDay->delete();
        
        return redirect()->route('somitee_days.index')
                         ->with('success', 'Somitee day deleted successfully!');
    }
}