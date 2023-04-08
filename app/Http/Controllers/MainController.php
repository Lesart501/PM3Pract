<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Country;
use App\Models\Operator;

class MainController extends Controller
{
    public function index(){
        $context = ['tours' => Tour::latest()->get(), 'countries' => Country::get()];
        return view('index', $context);
    }

    public function tours(){
        $context = ['tours' => Tour::latest()->get(), 'countries' => Country::get(), 'operators' => Operator::get()];
        return view('tours', $context);
    }
    public function tourSearch(Request $request){
        // Когда отзывы будут, сортировать будем по ним
        $context = [
            'tours' => Tour::where('countries_id', '=', $request->country)->where('people', '=', $request->people)
            ->where('nights', '=', $request->nights)->orderBy('price', 'asc')->get(),
            'countries' => Country::get(),
            'operators' => Operator::get()
        ];
        return view('tours', $context);
    }
    public function filter(Request $request){
        $tours = Tour::where('countries_id', '=', $request->country)->where('people', '=', $request->people)
            ->where('nights', '=', $request->nights)->orderBy('price', 'asc')->get();
        $output = '';
        foreach($tours as $tour){
            $output .= "<div class=\"card col p-0\" style=\"width: 20rem;\">
                <img class="."card-img-top"." src="."storage/uploads/tours/" . $tour->image .">
                <div class="."card-body".">
                    <h4 class=\"card-title mb-3\">" . $tour->name . "</h5>
                    <h5 class="."card-text".">" . $tour->place . ", " . $tour->country->name . "</h5>
                    <p class="."card-text".">" . $tour->nights . " ночей, " . $tour->people . " человека</p>
                    <p class=\"card-text text-primary fs-3\">" . $tour->price . " р.</p>
                    <a href=\"/home/" . $tour->id . "/book\" class=\"btn btn-primary\">Забронировать</a>
                </div>
            </div>";
        }
        return response($output);
    }

    public function about(){
        return view('about');
    }
}
