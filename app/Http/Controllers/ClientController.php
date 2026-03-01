<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('client.auth');
    }

    public function dashboard()
    {
        $client = Auth::guard('client')->user();

        if ($client->isAdmin()) {
            return redirect()->route('admin');
        }

        return view('index', compact('client'));
    }

    public function adminDashboard()
    {
        $client = Auth::guard('client')->user();

        if (! $client->isAdmin()) {
            return redirect()->route('client.profile');
        }

        return view('admin', compact('client'));
    }

    public function profile()
    {
        $client = Auth::guard('client')->user();

        return view('client_profile_simple', compact('client'));
    }

    public function viewClients()
    {
        $clients = Client::orderBy('created_at', 'desc')->get();

        return view('client_view', compact('clients'));
    }

    public function deleteClient($id)
    {
        $client = Client::findOrFail($id);

        // منع حذف المستخدم الحالي
        if ($client->client_id === Auth::guard('client')->id()) {
            return redirect()->back()->with('error', 'لا يمكنك حذف حسابك الخاص');
        }

        $client->delete();

        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
    }
}
