<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->roles;

        $income = Transaction::where('transaction_status','SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::with('details')->orderBy('id','DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status','PENDING')->count(),
            'failed' => Transaction::where('transaction_status','FAILED')->count(),
            'success' => Transaction::where('transaction_status','SUCCESS')->count(),
        ];

        if($role == '1'){
            return view('pages.admin.dashboard')->with([
                'income' => $income,
                'sales' => $sales,
                'items' => $items,
                'pie' => $pie
            ]);
        }else{
            return view('pages.user.dashboard')->with([
                'income' => $income,
                'sales' => $sales,
                'items' => $items,
                'pie' => $pie
            ]);
        }
    }
}
