<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Transaction;

class PaymentController extends Controller
{
    public function make(Request $request)
    {
        //la request contiene i dati per autorizzare il pagamento, ma non quelli del pagamento stesso (ovvero prezzo, ecc...)
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $amount = '15.99';
        
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
