<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Home;
use App\Models\about;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function index() {
        $home = Home::all();
        $about = About::all();
        $comments = Contact::latest()->get(); // ambil komentar terbaru
    
        return view('frontend.contact', [
            'home' => $home,
            'about' => $about,
            'comments' => $comments,
        ]);
    }
    
    function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
    
        Contact::create($data); // Simpan ke database
        return redirect()->back()->with('success', 'Terima kasih, kami sudah menerima kritik & saran Anda.');
    }

    public function indexadmin()
    {
        $comments = Contact::latest()->paginate(10);
        return view('dashboard.kritik', compact('comments'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return back()->with('success', 'Kritik & saran berhasil dihapus.');
    }

}
