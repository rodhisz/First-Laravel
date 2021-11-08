<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function pending()
    {
        $i = 1;
        if (Auth::user()) {
            //Nyari user yang punya pesanan berdasarkan ID
            $order = Order::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('id', 'desc')->get();
        }
        return view('transaction.pending', compact('order','i'));
    }

    public function EditPending(Request $request)
    {
        $order = Order::where('id', $request->id)->first();
        $order->status = $request->status;
        $order->update();
        return redirect()->back();
    }

    public function lunas()
    {
        $i = 1;
        if (Auth::user()) {
            //Nyari user yang punya pesanan berdasarkan ID
            $order = Order::where('user_id', Auth::user()->id)->where('status', 2)->orderBy('id', 'desc')->get();
        }
        return view('transaction.lunas', compact('order','i'));
    }

    public function EditLunas(Request $request)
    {
        $order = Order::where('id', $request->id)->first();
        $order->status = $request->status;
        $order->update();
        return redirect()->back();
    }

    public function dikirim()
    {
        $i = 1;
        if (Auth::user()) {
            //Nyari user yang punya pesanan berdasarkan ID
            $order = Order::where('user_id', Auth::user()->id)->where('status', 3)->orderBy('id', 'desc')->get();
        }
        return view('transaction.dikirim', compact('order','i'));
    }

}
