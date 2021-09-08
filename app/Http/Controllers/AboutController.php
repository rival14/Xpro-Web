<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class AboutController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $about = DB::table('config_abouts')->first();
        $slide = DB::table('slides')->where('type', 'about-us')->first();
        $config = DB::table('config_homes')->first();
        $clients = DB::table('clients')->get();
        $features = DB::table('features')->get();
        $services = DB::table('services')->get();
        $teams = DB::table('teams')->get();
        $skills = DB::table('skills')->where('type', 'office-skill')->get();
        $testimonies = DB::table('testimonies')->get();

        return view('about-us', [
            'config' => $config,
            'about' => $about,
            'slide' => $slide,
            'testimonies' => $testimonies,
            'teams' => $teams,
            'skills' => $skills,
            'services' => $services,
            'features' => $features,
            'clients' => $clients,
        ]);
    }

    public function browse($id)
    {
        $slide = DB::table('slides')->where('type', 'about-us')->first();
        $team = DB::table('teams')->where('id', $id)->first();
        $config = DB::table('config_homes')->first();
        $about = DB::table('config_abouts')->select('desc_about')->first();
        $clients = DB::table('clients')->get();
        $skills = DB::table('skills')->where('team_id', $id)->get();

        return view('detail-team', [
            'config' => $config,
            'team' => $team,
            'slide' => $slide,
            'clients' => $clients,
            'about' => $about,
            'skills' => $skills,
        ]);
    }

    public function contact()
    {
        $about = DB::table('config_abouts')->first();
        $slide = DB::table('slides')->where('type', 'contact')->first();
        $config = DB::table('config_homes')->first();
        $contact = DB::table('config_contacts')->first();
        $countries = DB::table('countries')->get();

        return view('contact', [
            'config' => $config,
            'contact' => $contact,
            'about' => $about,
            'slide' => $slide,
            'countries' => $countries,
        ]);
    }

    public function contactSubmit(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'subject' => 'required|string',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect('contact')->with('g-recaptcha-response', 'Captcha Required');
        }

        $insert = DB::table('contact_forms')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect('/');
    }

    public function team()
    {
        $about = DB::table('config_abouts')->first();
        $slide = DB::table('slides')->where('type', 'our-team')->first();
        $config = DB::table('config_homes')->first();
        $teams = DB::table('teams')->get();
        $skills = DB::table('skills')->where('type', 'office-skill')->get();

        return view('our-team', [
            'config' => $config,
            'about' => $about,
            'slide' => $slide,
            'teams' => $teams,
            'skills' => $skills,
        ]);
    }

    public function partner()
    {
        $about = DB::table('config_abouts')->first();
        $slide = DB::table('slides')->where('type', 'our-partner')->first();
        $config = DB::table('config_homes')->first();
        $clients = DB::table('clients')->get();
        $testimonies = DB::table('testimonies')->get();

        return view('our-partner', [
            'config' => $config,
            'about' => $about,
            'slide' => $slide,
            'testimonies' => $testimonies,
            'clients' => $clients,
        ]);
    }
}
