<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity; // <-- Import model Activity

class ActivityLogController extends Controller
{

    /**
     * Tampilkan daftar log aktivitas
     */
    public function index()
    {
        // Ambil semua log, urutkan dari yang terbaru, paginasi 20 per halaman
        $activities = Activity::with('causer') // Ambil juga data 'causer' (user yang melakukan)
                             ->latest()
                             ->paginate(20);

        return view('logs.index', compact('activities'));
    }
}