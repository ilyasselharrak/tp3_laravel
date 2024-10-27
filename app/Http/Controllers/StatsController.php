<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class StatsController extends Controller
{

    
    public function index()
    {
        
        $totalReservations = Reservation::count();
    
        // Nombre de réservations par mois
        $reservationsByMonth = Reservation::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();
    
        // Réservations des 30 derniers jours
        $recentReservations = Reservation::where('created_at', '>=', Carbon::now()->subDays(30))->count();
    
        // Taux d'occupation (si applicable)
        $totalRooms = Room::count(); // exemple si tu as une table Room
        $occupancyRate = $totalReservations / ($totalRooms * 30) * 100; // Taux d'occupation moyen
    
        return view('stats.index', compact('totalReservations', 'reservationsByMonth', 'recentReservations', 'occupancyRate'));
    }
    
}
