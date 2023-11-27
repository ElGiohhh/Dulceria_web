<?php

use App\Models\OrdenVenta;

class TicketController extends Controller
{
    public function list()
    {
        $tickets = OrdenVenta::all(); // Esto es un ejemplo, ajusta según tu lógica de obtención de tickets.

        return view('tickets.list', ['tickets' => $tickets]);
    }
}
