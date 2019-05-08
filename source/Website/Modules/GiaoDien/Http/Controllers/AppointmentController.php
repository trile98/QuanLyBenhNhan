<?php

namespace Modules\GiaoDien\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class AppointmentController extends Controller
{
    

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
    $serviceAccount = ServiceAccount::fromJsonFile(dirname(__DIR__,4).'/app/Http/Controllers/dacna-66ea5-9ee2da1e4e0a.json');
    $firebase = (new Factory())
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://dacna-66ea5.firebaseio.com/')
    ->create();
    $database = $firebase->getDatabase();
    $data=$database->getReference('WorkingTime');
        $array = $data->getValue();
        return view('giaodien::layouts.appointment',['WorkingTime'=>$array]);
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
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('giaodien::show');
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
