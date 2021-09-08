<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ServiceController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $slide = DB::table('slides')->where('type', 'service')->orderBy('created_at', 'DESC')->limit(1)->first();
        $about = DB::table('config_abouts')->first();
        $config = DB::table('config_homes')->first();
        $services = DB::table('services')->where('service_cat_id', $id)->get();
        $clients = DB::table('clients')->get();
        $testimonies = DB::table('testimonies')->get();

        return view('service', [
            'config' => $config,
            'services' => $services,
            'slide' => $slide,
            'testimonies' => $testimonies,
            'clients' => $clients,
            'about' => $about,
        ]);
    }

    public function browse($id)
    {
        $slide = DB::table('slides')->where('type', 'detail-service')->orderBy('created_at', 'DESC')->limit(1)->first();
        $config = DB::table('config_homes')->first();
        $about = DB::table('config_abouts')->select('desc_about')->first();
        $services = DB::table('services')->where('id', $id)->first();
        $allservices = DB::table('sub_service_lists')->where('service_list_id', $id)->get();
        $clients = DB::table('clients')->get();
        $faqs = DB::table('faqs')->get();
        $countries = DB::table('countries')->get();

        return view('detail-service', [
            'config' => $config,
            'services' => $services,
            'slide' => $slide,
            'clients' => $clients,
            'faqs' => $faqs,
            'about' => $about,
            'allservices' => $allservices,
            'countries' => $countries,
        ]);
    }

    public function browse_sub($service_id, $id)
    {
        $slide = DB::table('slides')->where('type', 'detail-service')->orderBy('created_at', 'DESC')->limit(1)->first();
        $config = DB::table('config_homes')->first();
        $about = DB::table('config_abouts')->select('desc_about')->first();
        $service = DB::table('services')->where('id', $service_id)->first();
        $services = DB::table('sub_service_lists')->where('id', $id)->first();
        $allservices = DB::table('sub_service_lists')->where('service_list_id', $service_id)->get();
        $clients = DB::table('clients')->get();
        $faqs = DB::table('faqs')->get();
        $countries = DB::table('countries')->get();

        return view('detail-service', [
            'config' => $config,
            'service' => $service,
            'services' => $services,
            'slide' => $slide,
            'clients' => $clients,
            'faqs' => $faqs,
            'about' => $about,
            'allservices' => $allservices,
            'countries' => $countries,
        ]);
    }

    public function callback(Request $request) {
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('g-recaptcha-response', 'Captcha Required');
        }
        DB::table('callbacks')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->back();
    }
}
