<?php

namespace App\Http\Controllers;

use App\Models\Massage;
use Illuminate\Http\Request;

class MassageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function massage()
    {
        $pesan = Massage::latest()->get();
        return view('backend.admin.massage.list', compact('pesan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',
            'pesan' => 'required|min:10',
        ]);

        Massage::create($data);

        return redirect()->back()->with([
            'massage-send' => 'Pesan anda berhasil dikirim, Terimakasih sudah menghubungi kami',
            'alert-type-send' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Massage $massage)
    {
        $massage->delete();

        return redirect()->back()->with([
            'massage-delete' => 'Data Massage Berhasil Dihapus',
            'alert-type-massage-delete' => 'danger',
        ]);
    }
}
