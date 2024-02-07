<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CarStoreRequest;
use App\Http\Requests\Admin\CarUpdateRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCar()
    {
        $car = Car::latest()->get();

        return view('frontend.pages.home', compact('car'));
    }

    public function index()
    {
        $car = Car::latest()->get();
        return view('backend.admin.car.list', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {
        if ($request->validated()) {
            $gambar = $request->file('gambar')->store(
                'gambar/cars',
                'public'
            );
            $slug = Str::slug($request->nama_mobil, '-');

            Car::create($request->except('gambar') + ['gambar' => $gambar, 'slug' => $slug]);
        }

        return redirect('cars')->with([
            'massage' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success',
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
    public function edit(Car $car)
    {
        return view('backend.admin.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->nama_mobil, '-');
            $car->update($request->validated() + ['slug' => $slug]);
        }

        return redirect('cars')->with([
            'massage-update' => 'Data Berhasil Di Edit',
            'alert-type-update' => 'info'
        ]);
    }

    public function updateImage(Request $request, $carID)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $car = Car::findOrFail($carID);

        if ($request->gambar) {
            unlink('storage/' . $car->gambar);
            $gambar = $request->file('gambar')->store(
                'gambar/cars',
                'public'
            );

            $car->update(['gambar' => $gambar]);
        }

        return redirect()->back()->with([
            'massage-image' => 'Gambar Berhasil Diupdate',
            'alert-type-image' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if ($car->gambar) {
            unlink('storage/' . $car->gambar);
        }

        $car->delete();

        return redirect()->back()->with([
            'massage-delete' => 'Data Berhasil Dihapus',
            'alert-type-delete' => 'danger',
        ]);
    }

    public function carDetails(Car $car)
    {
        return view('frontend.pages.detail', compact('car'));
    }
}
