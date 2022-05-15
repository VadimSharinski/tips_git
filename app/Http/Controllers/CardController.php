<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function addCardForm(){
        return view('card.add-card');
    }

    public function addCard(Request $request){
        Card::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'number' => $request->card_number,
            'expiration' => $request->expiration_date,
            'code' => $request->security_code,
        ]);
        return redirect()->route('tips.balance');
    }
}
