<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Dish;


class OrderGrapichController extends Controller
{
    public function controlPannel(){
        

        return view("admin.restaurants.statistics-graph", 
        // compact()
    );

    }
}

// Permettere ai ristoratori di visualizzare le statistiche degli ordini
// Visibilità: UR
// Descrizione: Un ristoratore ha la possibilità di vedere le statistiche degli ordini ricevuti
// Risultato: L'utente visualizza le statistiche degli ordini ricevuti per mese/anno e l’ammontare
// delle vendite