<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\comics;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('home', ['comics' => comics::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(comics $comics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comics $comics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comics $comics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comics $comics)
    {
        //
    }
}
