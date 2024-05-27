<?php

namespace App\Http\Controllers;

use App\Models\Lapor;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class HomeController extends Controller
{
    /**
     * Show the user Application dashboard 
     * 
                
     * @return Renderable
     */
    public function index(){
        return View('/dashboard',
        [
            "title" => 'Dashboard',
            
        ]);
    }
    

    /**
     * Show the petugas Application dashboard 
     * 
                
     * @return Renderable
     */
    public function petugashome(){
        return View('/petugas/dashboard',
        [
            "title" => 'Dashboard',
            'directory'=> '/petugas'
        ]);
    }

    /**
     * Show the petugas Application dashboard 
     * 
                
     * @return Renderable
     */
    public function adminhome(){
        return View('/administrasi/dashboard',[
            'title' => 'Dashboard',
            'directory'=> '/administrasi'
        ]);
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Lapor::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }


}
