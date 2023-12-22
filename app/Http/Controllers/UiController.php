<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\category;
use App\Models\Job;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        $categories = category::all();
        return view('ui_panel.welcome', compact('jobs', 'categories'));
    }

    public function search(Request $request)
    {
        $searchData = $request->search_data;
        $categories = category::all();

        $jobs = Job::where('title', 'like', '%'. $searchData . '%')
        ->orWhere('description', 'like', '%'. $searchData . '%')->get();

        return view('ui_panel.welcome', compact('jobs', 'categories'));
    }

    public function search_category($id)
    {
        $categories = category::all();
        $jobs = Job::where('category_id', $id)->get();
        return view('ui_panel.welcome', compact('jobs', 'categories'));
    }

    public function profile()
    {
        $user = Auth::user();
        $messages = Message::where('employee_id', $user->id)->get();

        return view('ui_panel.employee-profile', compact('messages', 'user'));
    }
}
