<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAndUpdateRumahSakitRequest;
use App\Models\RumahSakit;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RumahSakit::latest("created_at")->get();
        return response()->json($data);
    }

    public function view()
    {
        return view("rumah-sakit");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAndUpdateRumahSakitRequest $request)
    {
        $data = $request->validated();
        RumahSakit::create($data);
        return response()->json(['message' => 'success menambahkan rumah sakit']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAndUpdateRumahSakitRequest $request, string $id)
    {
        $data = $request->validated();
        RumahSakit::where('id', $id)->update($data);
        return response()->json(['message' => 'success mengubah rumah sakit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RumahSakit::where('id', $id)->delete();
        return response()->json(['message' => 'success menghapus rumah sakit']);
    }
}
