<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(auth()->user()->university == 'Jahangir Nagar University'){
            $amount = 100;
        }else{
            $amount = 300;
        }

        $check = Transaction::where('user_id', auth()->user()->id)->first();
        if(!$check){
            Transaction::create([
                'user_id' => auth()->user()->id,
                'amount' => $amount,
            ]);
        }

        $trxInfo = Transaction::where('user_id', auth()->user()->id)->first();

        return view('home', compact('trxInfo'));
    }
}
