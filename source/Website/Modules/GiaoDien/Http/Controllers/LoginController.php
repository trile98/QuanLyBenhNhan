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
use Socialite;
use User;
use Auth;

class LoginController extends Controller
{
    // public $checkLogin;
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
        // dd(Auth::user());
        if(!Auth::check())
            $headerlink = 'giaodien::header';
        else
            $headerlink = 'giaodien::login_header';
        return view('giaodien::layouts.Login',['headerLink'=>$headerlink])->with('alert', Auth::check());
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
    public function show()
    {
        // if(isset($_POST['gmailbtn'])){
            return Socialite::driver('google')->redirect();
        // }
        // else{
        //     return redirect()->back()->with('alert',"Loi");
        // }
    }

    /**
     * Logout user.
     * @param int $id
     * @return Response
     */
    public function logout_process()
    {
         // if(isset($_POST['Logoutbtn'])){
            // dd(Auth::check());
                Auth::logout();
            // dd(Auth::check());
            return redirect('')->with('alert',Auth::check());
            // auth()->logout();
            // return redirect('');
         // }
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


    public function checkPost(){
        // if(isset($_POST['LoginBtn']))
        //     return $this->Login();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/dang-nhap')->with('alert',$e);
        }
        // // only allow people with @company.com to login
        // if(explode("@", $user->email)[1] !== 'company.com'){
        //     return redirect()->to('/');
        // }
        // check if they're an existing user
            $this->createDatabase();

        $existingUser = $this->VerifyUser($user->email);

        if($existingUser){
            
            // log them in by id if acount exist
            Auth::loginUsingId($existingUser['id'], true);
        }
        else {
            // create a new user
            $NewUser = App\Http\Controllers\Auth\RegisterController::create($user->user);
            $this->database=$this->firebase->getDatabase();
            $UsersData = $this->database->getReference("Users_Account");
            $Users_Key_Array = $UsersData->getValue();

            $NumberOfKeys = count($Users_Key_Array); //= next key
            if($NumberOfKeys!=0)
                $this->database->getReference("Users_Account/".$NumberOfKeys)->set($user->user);
            else{
                $this->database->getReference("Users_Account/0")->set($user->user);
            }

            Auth::login($NewUser, true);
        }
        // dd(Auth::check());
        return redirect('')->with('alert',Auth::check());

        // print_r($user);
    }

    function VerifyUser($email){
        $this->createDatabase();
        $this->database=$this->firebase->getDatabase();
        $UsersData = $this->database->getReference("Users_Account");
        $Users_Account_Array = $UsersData->getValue();

        foreach ($Users_Account_Array as $User) {
            if($User['email']==$email){
                return $User;
            }
        }

        return null;

    }
}
