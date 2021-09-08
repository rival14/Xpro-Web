<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $projects = DB::table('projects')
        ->select('projects.*', 'project_cats.name as category_name')
        ->join('project_cats', 'project_cats.id', 'projects.project_cat_id')->get();
        $slide = DB::table('slides')->where('type', 'project')->first();
        $config = DB::table('config_homes')->first();
        $clients = DB::table('clients')->get();
        $testimonies = DB::table('testimonies')->get();

        return view('project', [
            'config' => $config,
            'projects' => $projects,
            'slide' => $slide,
            'testimonies' => $testimonies,
            'clients' => $clients,
        ]);
    }

    public function browse($id)
    {
        $projects = DB::table('projects')
        ->select('projects.*', 'project_cats.name as category_name')
        ->where('projects.project_cat_id', $id)
        ->join('project_cats', 'project_cats.id', 'projects.project_cat_id')->get();
        $slide = DB::table('slides')->where('type', 'project')->first();
        $config = DB::table('config_homes')->first();
        $clients = DB::table('clients')->get();
        $testimonies = DB::table('testimonies')->get();

        return view('project', [
            'config' => $config,
            'projects' => $projects,
            'slide' => $slide,
            'testimonies' => $testimonies,
            'clients' => $clients,
        ]);
    }

    public function browse_detail($cat_id, $id)
    {
        $project = DB::table('projects')
        ->select('projects.*', 'project_cats.name as category_name', 'project_cats.id as cat_id')
        ->where('projects.id', $id)
            ->join('project_cats', 'project_cats.id', 'projects.project_cat_id')->first();
        $related_project = DB::table('projects')
        ->select('projects.*', 'project_cats.name as category_name', 'project_cats.id as cat_id')
        ->join('project_cats', 'project_cats.id', 'projects.project_cat_id')
        ->where('project_cat_id', $project->cat_id)->whereNotIn('projects.id', [$project->id])->get();
        $slide = DB::table('slides')->where('type', 'detail-project')->orderBy('created_at', 'DESC')->limit(1)->first();
        $config = DB::table('config_homes')->first();
        $about = DB::table('config_abouts')->select('desc_about')->first();
        $clients = DB::table('clients')->where('project_cat_id', $cat_id)->get();
        $faqs = DB::table('faqs')->get();
        $countries = DB::table('countries')->first();

        return view('detail-project', [
            'config' => $config,
            'project' => $project,
            'related_project' => $related_project,
            'slide' => $slide,
            'clients' => $clients,
            'faqs' => $faqs,
            'about' => $about,
            'country' => $countries,
        ]);
    }
}
