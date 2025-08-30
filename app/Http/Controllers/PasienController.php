<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAndUpdatePasienRequest;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rumahSakit = $request->rumahSakit;

        $query = Pasien::with('rumahSakit');
        if ($rumahSakit !== null) {
            $query = $query->where('rumah_sakit_id', $rumahSakit);
        }
        $data = $query->latest("created_at")->get();

        return response()->json($data);
    }

    public function view()
    {
        return view("pasien");
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
    public function store(StoreAndUpdatePasienRequest $request)
    {
        $data = $request->validated();
        $data["rumah_sakit_id"] = $data["rumah_sakit"];
        unset($data["rumah_sakit"]);
        Pasien::create($data);
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
    public function update(StoreAndUpdatePasienRequest $request, string $id)
    {
        $data = $request->validated();
        $data["rumah_sakit_id"] = $data["rumah_sakit"];
        unset($data["rumah_sakit"]);
        Pasien::where('id', $id)->update($data);
        return response()->json(['message' => 'success mengubah pasien']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pasien::where('id', $id)->delete();
        return response()->json(['message' => 'success menghapus pasien']);
    }
}
