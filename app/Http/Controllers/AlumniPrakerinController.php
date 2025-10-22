<?php

namespace App\Http\Controllers;

use App\Models\AlumniPrakerin;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlumniRequest; // <-- Ganti
use App\Http\Requests\UpdateAlumniRequest; // <-- Ganti
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AlumniPrakerinController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumni = AlumniPrakerin::latest()->paginate(10);
        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumniRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id(); // Ambil ID user yang login

        // Handle Upload Foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('alumni/foto', 'public');
        }

        // Handle Upload Hasil Karya
        if ($request->hasFile('hasil_karya')) {
            $data['hasil_karya'] = $request->file('hasil_karya')->store('alumni/karya', 'public');
        }

        AlumniPrakerin::create($data);

        // Activity log akan otomatis tercatat oleh Trait di Model

        return redirect()->route('alumni.index')
                         ->with('success', 'Data alumni berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AlumniPrakerin $alumnus) // <-- UBAH DI SINI
    {
        // Kita pass $alumnus ke view, tapi kita beri nama 'alumni'
        // agar view blade kita (show.blade.php) tidak perlu diubah
        return view('alumni.show', ['alumni' => $alumnus]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlumniPrakerin $alumnus) // <-- UBAH DI SINI
    {
        // Sama seperti di atas, kita pass $alumnus sebagai 'alumni'
        return view('alumni.edit', ['alumni' => $alumnus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumniRequest $request, AlumniPrakerin $alumnus) // <-- UBAH DI SINI
    {
        $data = $request->validated();
        
        // Langsung gunakan $alumnus (tidak perlu $alumni = $alumniPrakerin)

        // Handle Update Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($alumnus->foto && Storage::disk('public')->exists($alumnus->foto)) {
                Storage::disk('public')->delete($alumnus->foto);
            }
            $data['foto'] = $request->file('foto')->store('alumni/foto', 'public');
        }

        // Handle Update Hasil Karya
        if ($request->hasFile('hasil_karya')) {
            // Hapus file lama jika ada
            if ($alumnus->hasil_karya && Storage::disk('public')->exists($alumnus->hasil_karya)) {
                Storage::disk('public')->delete($alumnus->hasil_karya);
            }
            $data['hasil_karya'] = $request->file('hasil_karya')->store('alumni/karya', 'public');
        }

        $alumnus->update($data); // <-- Gunakan $alumnus

        return redirect()->route('alumni.index')
                         ->with('success', 'Data alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlumniPrakerin $alumnus) // <-- UBAH DI SINI
    {
        // Langsung gunakan $alumnus

        // Hapus foto
        if ($alumnus->foto && Storage::disk('public')->exists($alumnus->foto)) {
            Storage::disk('public')->delete($alumnus->foto);
        }
        // Hapus file karya
        if ($alumnus->hasil_karya && Storage::disk('public')->exists($alumnus->hasil_karya)) {
            Storage::disk('public')->delete($alumnus->hasil_karya);
        }

        $alumnus->delete(); // <-- Gunakan $alumnus

        return redirect()->route('alumni.index')
                         ->with('success', 'Data alumni berhasil dihapus.');
    }
}