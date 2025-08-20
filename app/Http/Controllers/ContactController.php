<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index'); // ini nyambung ke resources/views/contact/index.blade.php
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Simpan ke database
        Contact::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('contact')->with('success', 'Pesan kamu sudah dikirim!');
    }
}
