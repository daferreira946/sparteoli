<?php

namespace App\Http\Controllers;

use App\Nature;
use App\Occurrence;
use App\Type;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $natures = Nature::all();
        $types = Type::all();
        $months = DB::table('occurrences')
            ->select(DB::raw('MONTHNAME(date) name'), DB::raw('count(*) as total'))
            ->groupBy('name')
            ->orderBy('name', 'DESC')
            ->get();
        $bairros = DB::table('occurrences')
            ->select(DB::raw('neighborhood name'), DB::raw('count(*) as total'))
            ->groupBy('name')
            ->orderBy('name', 'DESC')
            ->get();

        return view('home', compact('natures', 'months', 'types', 'bairros'));
    }
}
