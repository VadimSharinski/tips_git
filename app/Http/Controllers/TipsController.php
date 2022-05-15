<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Tips;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipsController extends Controller
{
    public function sendTipsForm(Request $request){
        $userId = $request->id;
        return view('send-tips', compact('userId'));
    }

    public function sendTips(Request $request){
        if(!$request->id){
            return redirect()->route('qrcode.generate');
        }

        $tips = Tips::create([
            'user_id' => $request->id,
            'amount' => $request->tips_count,
            'currency_code' => 'USD',
            'type' => 1,
            'status' => 0,
            'method' => 1,
            'paid' => date("Y-m-d H:i:s"),
            'time' => date("Y-m-d H:i:s")
        ]);

        CashFlow::create([
            'user_id' => $request->id,
            'direction' => 1,
            'amount_before' => DB::table('users')->where('id', $request->id)->value('money'),
            'amount_after' => DB::table('users')->where('id', $request->id)->value('money') + $request->tips_count,
            'amount' => $request->tips_count,
            'currency_code' => 'USD',
            'currency_rate' => 1,
            'oper_id' => $tips->id,
        ]);

        DB::table('users')->increment('money', $request->tips_count);

        return redirect()->route('qrcode.generate');
    }

    public function withdrawTipsForm(Request $request){
        return view('withdraw-tips');
    }

    public function withdrawTips(Request $request){
        $oper_id = rand(1, 10000);
        Payment::create([
            'id' => $oper_id,
            'user_id' => auth()->user()->id,
            'amount' => $request->tips_count,
            'currency_code' => 'USD',
            'type' => 1,
            'status' => 0,
            'method' => 1,
            'paid' => date("Y-m-d H:i:s"),
            'time' => date("Y-m-d H:i:s")
        ]);

        CashFlow::create([
            'user_id' => auth()->user()->id,
            'direction' => 0,
            'amount_before' => DB::table('users')->where('id', auth()->user()->id)->value('money'),
            'amount_after' => DB::table('users')->where('id', auth()->user()->id)->value('money') - $request->tips_count,
            'amount' => $request->tips_count,
            'currency_code' => 'USD',
            'currency_rate' => 1,
            'oper_id' => $oper_id,
        ]);

        DB::table('users')->decrement('money', $request->tips_count);

        return redirect()->route('qrcode.generate');
    }
}
