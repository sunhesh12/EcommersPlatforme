<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
public function downloadOrderSummary()
{
    $cartItems = AddToCart::with('product')->where('user_id', Auth::id())->get();
    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }
    $sum = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

    $pdf = Pdf::loadView('pdf.order-summary', [
        'cartItems' => $cartItems,
        'sum' => $sum,
        'count' => count($cartItems),
    ]);

    return $pdf->download('order-summary.pdf');
}

}
