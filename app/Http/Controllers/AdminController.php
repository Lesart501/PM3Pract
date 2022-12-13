<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $context = ['tours' => Tour::latest()->get()];
        return view('admin', $context);
    }

    public function addTourForm() {
        return view('tour_add');
    }
    public function saveTour(Request $request) {
        $name = $request->name;
        $country = $request->country;
        $image = $request->file('image');
        $image_name = $name . $country . time() . $image->extension();
        $image_path = 'public/img/tours_images/' . $image_name;
        Storage::putFileAs($image_path, (string)$image->encode('png', 95), $image_name);
        Tour::create(['name' => $name, 'country' => $country,'people' => $request->people,'nights' => $request->nights,'image' => $image_path,'operators_id' => $request->operators_id,'price' => $request->price]);
        return redirect()->route('admin');
    }

    public function editTourForm(Tour $tour) {
        return view('tour_edit', ['tour' => $tour]);
    }
    public function updateTour(Request $request, Tour $tour) {
        $name = $request->name;
        $country = $request->country;
        $image = $request->file('image');
        $image_name = $name . $country . time() . $image->extension();
        $image_path = 'public/img/tours_images/' . $image_name;
        Storage::putFileAs($image_path, (string)$image->encode('png', 95), $image_name);
        $tour->fill(['name' => $name, 'country' => $country,'people' => $request->people,'nights' => $request->nights,'image' => $image_path,'operators_id' => $request->operators_id,'price' => $request->price]);
        return redirect()->route('admin');
    }

    public function deleteTourForm(Tour $tour) {
        return view('tour_delete', ['tour' => $tour]);
    }
    public function destroyTour(Request $request, Tour $tour) {
        $tour->delete();
        return redirect()->route('admin');
    }
}
