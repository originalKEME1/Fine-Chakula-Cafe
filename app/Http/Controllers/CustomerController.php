<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
 public function dashboard()
 {
 if (Auth::user()->role !== 'customer') {
 abort(403);
 }
 $orders = Auth::user()
 ->orders()
 ->latest()
 ->get();
 return view('customer-dashboard', compact('orders'));
 }
}
