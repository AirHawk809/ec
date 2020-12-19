<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Cherge;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
  public function client()
  {
    Stripe::setApiKey('sk_test_51HxR0jBhrqWrgmxZXDqqYyUFa42DDBAQJChUBhwCAjMvqeqmjPwap0GU14bTj3euqrDqp5spt6LA2agejRdUMySK00Aza7GhUo');
    $intent = PaymentIntent::create([
      'amount' => 2000,
      'currency' => 'jpy',
      'payment_method_types' => ['card'],
      'statement_descriptor' => 'Custom descriptor',
      'setup_future_usage' => 'off_session',
      'metadata' => [
        'username' => 'me',
        'order_id' => '6735',
      ],
    ]);
    logger()->info($intent);
    return $intent;
  }
}
