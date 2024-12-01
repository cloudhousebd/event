<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use DB;

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

        $check = DB::table('cards')->where('user_id', auth()->user()->id)->first();

        if(!$check){
            $manager = new ImageManager(new Driver());
            $image = $manager->read('template.jpg');
            $image->text(auth()->user()->name, 300, 640, function($font){
                $font->file(public_path('kalpurush.ttf'));
                $font->size(40);
                $font->color('fff');
            });

            $image->text(auth()->user()->id, 320, 940, function($font){
                $font->file(public_path('barcode.ttf'));
                $font->size(82);
                $font->color('000');
            });

            $image->save(public_path('cards/'. auth()->user()->id .'.jpg'));

            $path = 'cards/'. auth()->user()->id .'.jpg';

            DB::table('cards')->insert([
                'user_id' => auth()->user()->id,
                'url' => $path,
            ]);
        }

        $card_url = DB::table('cards')->where('user_id', auth()->user()->id)->first();

        $trxInfo = Transaction::where('user_id', auth()->user()->id)->first();

        return view('home', compact('trxInfo', 'card_url'));
    }
}
