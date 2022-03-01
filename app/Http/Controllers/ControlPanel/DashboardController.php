<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        # code...
        $project = Project::get();
        $blog = Blog::get();
        $contact = Contact::get();
        $order = Order::get();
        $client = Client::get();
        $ordersTable = Order::latest()->take(10)->get();
        $contactsTable = Contact::latest()->take(10)->get();

        return view('control-panel.dashboard',[
            'project' => $project,
            'blog' => $blog,
            'contact' => $contact,
            'order' => $order,
            'client' => $client,
            'orders' => $ordersTable,
            'contacts' => $contactsTable,
        ]);
    }
}
