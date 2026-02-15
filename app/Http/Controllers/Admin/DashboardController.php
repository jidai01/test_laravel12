<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil pesan terbaru (pagination 10 data per halaman)
        $messages = Contact::latest()->paginate(10);

        // Menghitung total pesan untuk statistik kecil
        $totalMessages = Contact::count();

        return view('admin.dashboard', compact('messages', 'totalMessages'));
    }

    public function destroy($id)
    {
        // Fitur untuk menghapus pesan yang tidak penting
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('status', 'Pesan berhasil dihapus!');
    }
}
