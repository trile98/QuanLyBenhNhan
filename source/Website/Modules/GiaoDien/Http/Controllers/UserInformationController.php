<?php

namespace Modules\GiaoDien\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Kreait\Firebase\Exception\AuthException;

use App\Http\Controllers\Auth\RegisterController;
use Socialite;
use App;
use App\User as User;
use Auth;

class UserInformationController extends Controller
{
    private $firebase, $database;

    public function createDatabase(){
        $serviceAccount = ServiceAccount::fromJsonFile(dirname(__DIR__,4).'/app/Http/Controllers/dacna-66ea5-9ee2da1e4e0a.json');
        $this->firebase = (new Factory())
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://dacna-66ea5.firebaseio.com/')
        ->create();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $headerlink = 'giaodien::login_header';
        $user = Auth::user();

        $this->createDatabase();
        $UserFromFirebase = (array) $this->firebase->getAuth()->getUserByEmail($user->email);
        $uid = $UserFromFirebase['uid'];

        $this->database=$this->firebase->getDatabase();
        $existArticles = $this->database->getReference("Article/".$uid)->getValue();

        // dd($existArticles);
        return view('giaodien::layouts.userInformation',['headerLink'=>$headerlink,'user'=>$user,'articles'=>$existArticles]);
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
