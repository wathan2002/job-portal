<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function payment()
    {
        return view('admin.payment.index');
    }

    public function paymentStore(Request $request)
    {
        $request->validate([
            'image'=>"required|image|mimes:png,jpg,jpeg,webp",
        ]);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/voucher-images/', $imageName);

        Payment::create([
            'employer_id'=>$request->employer_id,
            'voucher_image'=>$imageName,

        ]);

        return redirect()->route('payment');
    }

    public function userList()
    {
        $users = User::where('role', 'employer')->orWhere('role', 'admin')->get();
        return view('admin.user.index', compact('users'));
    }

    public function paymentDetail(Request $request, $employerId)
    {
        $payment = Payment::where('employer_id', $employerId)->first();
        $user = User::find($employerId);
        return view('admin.user.payment-detail', compact('payment', 'user'));
    }

    public function paymentConfirm(Request $request, $userId)
    {
        $user = User::findOrfail($userId);
        $user->update([
            'active'=> 1
        ]);
        return back();
    }

    public function report()
    {
        $applicants = Application::where('accept', 0)->get();
        $workers = Application::where('accept', 1)->get();
        return view('admin/report/index', compact('applicants', 'workers'));
    }
}
