<?php

namespace App\Http\Controllers\Admin;

use App\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::where('status',4)->get();
        return view('admin.shipments.index')->with('shipments',$shipments);

    }
}
