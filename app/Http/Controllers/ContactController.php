<?php

namespace App\Http\Controllers;

use App\Mail\ContactNotification;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 422);
        }

        try {
            // 1. Simpan ke Database
            $contact = Contact::create($request->all());

            // 2. Kirim Email ke Kamu
            // Ganti 'email_tujuan@gmail.com' dengan email pribadimu
            Mail::to('jidaiishere@gmail.com')->send(new ContactNotification($request->all()));

            return response()->json([
                'status'  => 'success',
                'success' => 'Pesan terkirim dan notifikasi telah dikirim ke admin!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal mengirim pesan: ' . $e->getMessage()
            ], 500);
        }
    }
}
