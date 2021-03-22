<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Transaction;

class PaymentController extends Controller
{
    public function make(Request $request)
    {
        // dd($request);
        //la request contiene i dati per autorizzare il pagamento, ma non quelli del pagamento stesso (ovvero prezzo, ecc...)
        $payload = $request->input('payload', false);
        $sponsorship = $request->input('sponsorship', false);
        $user = $request->input('user',false);
        $nonce = $payload['nonce'];
        $amount = $sponsorship['price'];

        $status = \Braintree\Transaction::sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
        //response rimanda indietro diversi dati tra cui l'amount e la data della transazione
    }
}
