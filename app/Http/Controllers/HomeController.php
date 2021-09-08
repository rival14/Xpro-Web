<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $config = DB::table('config_homes')->first();
        $about = DB::table('config_abouts')->first();
        $feature = DB::table('features')->get();
        $clients = DB::table('clients')->get();
        $services = DB::table('services')->get();
        $faqs = DB::table('faqs')->get();
        $slides = DB::table('slides')->where('type', 'home')->get();
        $blogs = DB::table('blogs')
            ->select( 'categories.category_name', 'categories.id as category_id', 'blogs.*')
            ->join('categories', 'categories.id', 'blogs.categori_id')->limit(2)->get();

        return view('home', [
            'config' => $config,
            'feature' => $feature,
            'clients' => $clients,
            'about' => $about,
            'services' => $services,
            'faqs' => $faqs,
            'slides' => $slides,
            'blogs' => $blogs,
        ]);
    }

    public function subscribe(Request $request) {
        DB::table('emails')->insert([
            'email' => $request->email
        ]);

        return redirect('/');

    }
}
