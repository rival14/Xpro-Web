<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;


class BlogController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $slide = DB::table('slides')->where('type', 'blog')->first();
        $config = DB::table('config_homes')->first();
        $clients = DB::table('clients')->get();
        $blogs = DB::table('blogs')
        ->select('categories.category_name', 'categories.id as category_id', 'blogs.*')
        ->join('categories', 'categories.id', 'blogs.categori_id')
        ->orderBy('blogs.created_at', 'ASC')
        ->get();
        $categories = DB::table('categories')->get();
        $archives = DB::table('blogs')
        ->select(DB::raw('MONTH(created_at) as created_at'), DB::raw('count(*) as count'))
        ->groupBy('created_at')
        ->get();

        return view('blog-list', [
            'config' => $config,
            'slide' => $slide,
            'categories' => $categories,
            'blogs' => $blogs,
            'clients' => $clients,
            'archives' => $archives,
        ]);
    }

    public function browse($id)
    {
        $slide = DB::table('slides')->where('type', 'blog')->first();
        $config = DB::table('config_homes')->first();
        $clients = DB::table('clients')->get();
        $blog = DB::table('blogs')
        ->select( 'categories.category_name', 'categories.id as category_id', 'blogs.*')
        ->where('blogs.id', $id)
        ->join('categories', 'categories.id', 'blogs.categori_id')
        ->orderBy('blogs.created_at', 'ASC')
        ->first();
        $blogs = DB::table('blogs')
        ->select('categories.category_name', 'categories.id as category_id', 'blogs.*')
        ->join('categories', 'categories.id', 'blogs.categori_id')
        ->orderBy('blogs.created_at', 'ASC')
        ->get();
        $categories = DB::table('categories')->get();
        $archives = DB::table('blogs')
        ->select(DB::raw('MONTH(created_at) as created_at'), DB::raw('count(*) as count'))
        ->groupBy('created_at')
        ->get();

        return view('blog-post', [
            'config' => $config,
            'slide' => $slide,
            'categories' => $categories,
            'blog' => $blog,
            'blogs' => $blogs,
            'clients' => $clients,
            'archives' => $archives,
        ]);
    }

    public function categories($id)
    {
        $slide = DB::table('slides')->where('type', 'blog')->first();
        $config = DB::table('config_homes')->first();
        $clients = DB::table('clients')->get();
        $blogs = DB::table('blogs')
        ->select( 'categories.category_name', 'categories.id as category_id', 'blogs.*')
        ->where('categori_id', $id)
        ->join('categories', 'categories.id', 'blogs.categori_id')
        ->orderBy('blogs.created_at', 'ASC')
        ->get();
        $categories = DB::table('categories')->get();
        $archives = DB::table('blogs')
        ->select(DB::raw('MONTH(created_at) as created_at'), DB::raw('count(*) as count'))
        ->groupBy('created_at')
        ->get();

        return view('blog-list', [
            'config' => $config,
            'slide' => $slide,
            'categories' => $categories,
            'blogs' => $blogs,
            'clients' => $clients,
            'archives' => $archives,
        ]);
    }

    public function search()
    {
        $slide = DB::table('slides')->where('type', 'blog')->first();
        $config = DB::table('config_homes')->first();
        $clients = DB::table('clients')->get();
        $blogs = DB::table('blogs')
        ->where('title', 'like', '%' . $_GET['search'] . '%')
        ->orWhere('blog', 'like', '%' . $_GET['search'] . '%')
        ->select('categories.category_name', 'categories.id as category_id', 'blogs.*')
        ->join('categories', 'categories.id', 'blogs.categori_id')
        ->orderBy('blogs.created_at', 'ASC')
            ->get();
        $categories = DB::table('categories')->get();
        $archives = DB::table('blogs')
        ->select(DB::raw('MONTH(created_at) as created_at'), DB::raw('count(*) as count'))
        ->groupBy('created_at')
        ->get();

        return view('blog-list', [
            'config' => $config,
            'slide' => $slide,
            'categories' => $categories,
            'blogs' => $blogs,
            'clients' => $clients,
            'archives' => $archives,
        ]);
    }
}
