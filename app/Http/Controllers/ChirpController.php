<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;

// Inertia include files
use Inertia\Inertia;
use Inertia\Response;


class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
//        return response("Hello in response");

        return Inertia::render('chirp/index', [
            'chirp' =>Chirp::with('user:id|name')->latest()->get(),
            ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mesas' => 'required|string|max:255',
        ]);

        $request->user()->chirp()->create($validated);

        return redirect(route('chirp.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
