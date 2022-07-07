<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Diver;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::with(['items', 'payments'])->get();
        $divers = Diver::all();
        $customers_count = Customer::count();

        return view('home', [
            'orders_count' => $orders->count(),
            'income' => $orders->map(function ($i) {
                if ($i->receivedAmount() > $i->total()) {
                    return $i->total();
                }
                return $i->receivedAmount();
            })->sum(),
            'income_today' => $orders->where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->map(function ($i) {
                if ($i->receivedAmount() > $i->total()) {
                    return $i->total();
                }
                return $i->receivedAmount();
            })->sum(),
            'incomebuying' => $orders->map(function ($i) {
                return $i->totalbuying();
            })->sum(),
            'buying_today' => $orders->where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->map(function ($i) {
                return $i->totalbuying();
            })->sum(),
            'diver' => $divers->sum("price"),
            'diver_today' => $divers->where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->sum("price"),
            'customers_count' => $customers_count
        ]);
    }
}
