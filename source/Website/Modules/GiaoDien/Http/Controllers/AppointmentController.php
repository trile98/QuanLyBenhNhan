<?php

namespace Modules\GiaoDien\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use App\User as User;
use Auth;

class AppointmentController extends Controller
{
    private $firebase, $database;

    public function createDatabase(){
        $serviceAccount = ServiceAccount::fromJsonFile(dirname(__DIR__,4).'/app/Http/Controllers/dacna-66ea5-9ee2da1e4e0a.json');
        $this->firebase = (new Factory())
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://dacna-66ea5.firebaseio.com/')
        ->create();
        $this->database = $this->firebase->getDatabase();

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
       if(!Auth::check())
            return redirect('/dang-nhap');
        else{
            $user = Auth::user();

            $headerlink = 'giaodien::login_header';
            $showVar =0;
            return view('giaodien::layouts.appointment',['ShowVar'=>$showVar,'dateValue'=>null,'headerLink'=>$headerlink,'user'=>$user]);
        }
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
    public function store()
    {
        if(isset($_POST['confirmAppointment'])){
            $Date = isset($_POST['chosenDate'])? $_POST['chosenDate']:"";
            $Time = isset($_POST['chosenTime'])? $_POST['chosenTime']:"";

            $this->createDatabase();
            
            $DataRef=$this->database->getReference('ServingHours/'.$Date."/".$Time);

            //so luong hien tai
            $numberOfRegistration = $this->database->getReference('ServingHours/'.$Date."/".$Time."/numberOfRegistration")->getValue();

            //cap nhat so luong moi
            $numberOfRegistration= +$numberOfRegistration;
            $numberOfRegistration+=1;
            $numberOfRegistration="".$numberOfRegistration;

            $this->database->getReference('ServingHours/'.$Date."/".$Time."/numberOfRegistration")->set($numberOfRegistration);
            if($numberOfRegistration=="10"){
                $this->database->getReference('ServingHours/'.$Date."/".$Time."/isDisable")->set("true");
            }

            $user = Auth::user();

            $UserFromFirebase = (array) $this->firebase->getAuth()->getUserByEmail($user->email);
            $uid = $UserFromFirebase['uid'];

            if($numberOfRegistration=="1"){
                $this->database->getReference('ServingHours/'.$Date."/".$Time."/patientUID")->set(["0"=>$uid]);
            }
            else{
                $patientOrder = +$numberOfRegistration -1;
                $patientOrder = "".$patientOrder;
                //array current patient
                $arrayOfPatient = $this->database->getReference('ServingHours/'.$Date."/".$Time."/patientUID")->getValue();
                $arrayOfPatient += [$patientOrder=>$uid];
                $this->database->getReference('ServingHours/'.$Date."/".$Time."/patientUID")->set($arrayOfPatient);
            }
            return redirect()->back()->with('alert','Đặt lịch thành công');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($date)
    {
        if(!Auth::check())
            return redirect('/dang-nhap');
        else{
            $user = Auth::user();
            
            $headerlink = 'giaodien::login_header';

            $this->createDatabase();

            $data=$this->database->getReference('ServingHours/'.$date);
            $array = $data->getValue();

            //xep lai mang 
            ksort($array,SORT_NATURAL );

            if(!empty($array)){
               $showVar=1;
                return view('giaodien::layouts.appointment',['ServingHours'=>$array,'ShowVar'=>$showVar,'dateValue'=>$date,'headerLink'=>$headerlink,'user'=>$user]); 
            }
            else{
                $showVar=0;
                return view('giaodien::layouts.appointment',['ShowVar'=>$showVar,'dateValue'=>$date,'headerLink'=>$headerlink,'user'=>$user])->with('alert',"Dữ liệu trống");
            } 
        }
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
        if(isset($_POST['ShowCalendarBtn'])){
            if(isset($_POST['date']))
                return $this->show($_POST['date']);
            else{
                return redirect()->back()->with('alert','thieu thong tin!!');
            }
        }

        else{
            return redirect()->back()->with('alert','thất bại!!');
        }
    }
}
