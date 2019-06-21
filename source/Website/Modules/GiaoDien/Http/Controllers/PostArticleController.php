<?php

namespace Modules\GiaoDien\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class PostArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if(!auth()->check())
            $headerlink = 'giaodien::header';
        else
            $headerlink = 'giaodien::login_header';
        return view('giaodien::layouts.PostArticle',['headerLink'=>$headerlink]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('giaodien::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
         if(isset($_POST['PostFormSubmit'])){
            $Title = isset($_POST['ArticleTitle'])? $_POST['ArticleTitle']:"";
            $Author = isset($_POST['ArticleAuthor'])? $_POST['ArticleAuthor']:"";
            $Content = isset($_POST['ArticleContent'])? $_POST['ArticleContent']:"";
            
            
        }
        else{
            return redirect()->back()->with('alert','không tồn tại!!');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('giaodien::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
