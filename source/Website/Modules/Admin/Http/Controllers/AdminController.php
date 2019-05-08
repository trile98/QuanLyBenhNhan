<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class AdminController extends Controller
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
        return view('admin::adminLogin');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
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

    public function processLogin(Request $request){

        if (isset($_POST['LoginBtn'])) {
            
            $this->createDatabase();
            $this->database=$this->firebase->getDatabase();
            $UsersData = $this->database->getReference("Users_Account");
            $Users_Account_Array = $UsersData->getValue();

            // get data from form
            $UserName = isset($_POST['username']) ? $_POST['username'] : '';
            $Password = isset($_POST['password']) ? $_POST['password'] : '';

            if (!$UserName || !$Password){
                return redirect()->back()->with('alert','Bạn chưa nhập đủ thông tin');
            }

            $check_username = 'false';
            foreach ($Users_Account_Array as $User) {
                if($User['user_name']==$UserName){
                    if($User['password']==$Password){
                        if($User['Authority']==1){

                        }
                        else{
                            return redirect()->back()->with('alert','Bạn không có quyền truy cập'); //ten dang nhap dung nhung khong  co quyen admin
                        }
                    }
                    else{
                        return redirect()->back()->with('alert','Sai mật khẩu!!');
                    }
                    $check_username='true';
                }
            }

            if($check_username==='false'){
                return redirect()->back()->with('alert','Tài khoản không tồn tại!!');
            }
        }
        else{
                return redirect()->back()->with('alert','không tồn tại!!');

        }
    }
}
