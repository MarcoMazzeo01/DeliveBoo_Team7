<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;

class OrderGrapichController extends Controller
{
    public function controlPannel(){
        
        $user = auth()->id();
        

        $dataAll = Dish::withTrashed()
        ->leftJoin('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        ->where('dishes.restaurant_id', $user) 
        ->select(
            'dishes.id',
            'dishes.name',
            DB::raw('COALESCE(SUM(dish_order.quantity), 0) as total_quantity'),
            DB::raw('COALESCE(SUM(dish_order.quantity * dishes.price), 0) as total_price')
        )
        ->groupBy('dishes.id', 'dishes.name')
        ->get();

        $today = now()->toDateString(); // Ottieni la data corrente come stringa (es. 'YYYY-MM-DD')
    
        $dataToday = Dish::withTrashed()
            ->join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
            ->join('orders', 'dish_order.order_id', '=', 'orders.id')
            ->where('dishes.restaurant_id', $user)
            ->whereDate('orders.created_at', '=', $today) // Aggiungi la condizione per la data
            ->select(
                'dishes.id',
                'dishes.name',
                DB::raw('COALESCE(SUM(dish_order.quantity), 0) as total_quantity'),
                DB::raw('COALESCE(SUM(dish_order.quantity * dishes.price), 0) as total_price')
            )
            ->groupBy('dishes.id', 'dishes.name')
            ->get();
        
        return view("admin.restaurants.statistics-graph", compact('dataToday', 'dataAll')
        
       
        
    );  

    }
}

// Permettere ai ristoratori di visualizzare le statistiche degli ordini
// Visibilità: UR
// Descrizione: Un ristoratore ha la possibilità di vedere le statistiche degli ordini ricevuti
// piatto piu ordinato, -> questo mese. -> questo anno . Media del totale per mese ed anno. Utente che ha ordinat di più
// Risultato: L'utente visualizza le statistiche degli ordini ricevuti per mese/anno e l’ammontare
// delle vendite