<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class TimeController extends Controller
{
    private $database;

    function setupDatabase(){
       $serviceAccount = ServiceAccount::fromJsonFile(dirname(__DIR__,4).'/app/Http/Controllers/dacna-66ea5-9ee2da1e4e0a.json');
       $firebase = (new Factory())
       ->withServiceAccount($serviceAccount)
       ->withDatabaseUri('https://dacna-66ea5.firebaseio.com/')
       ->create();
       $this->database = $firebase->getDatabase();
   }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $cssName ='TimeManagement.css';
        return view('admin::TimeManagement.TimeManagement',['cssName'=>$cssName]);
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
        if (isset($_POST['TimeSubmit'])) {
             // get data from form
            $StartTime = isset($_POST['StartTime']) ? $_POST['StartTime'] : '';
            $CloseTime = isset($_POST['CloseTime']) ? $_POST['CloseTime'] : '';
            $SpaceTime = isset($_POST['SpaceTime']) ? $_POST['SpaceTime'] : '';
            $ApplyDate = isset($_POST['ApplyDate']) ? $_POST['ApplyDate'] : '';

            if (!$StartTime || !$CloseTime|| !$SpaceTime|| !$ApplyDate){
                return redirect()->back()->with('alert','Bạn chưa nhập đủ thông tin');
            }
            else{
                $TimeArray = [];
                $StartTimeOfBlock=$StartTime;
                $EndTimeOfBlock=" ";
                do{
                    $EndTimeOfBlock=$this->TimeCalculate($StartTimeOfBlock,$CloseTime,$SpaceTime);
                
                    $TimeArray=Arr::add($TimeArray,$StartTimeOfBlock.'-'.$EndTimeOfBlock,array('isDisable'=> 'false','numberOfRegistration'=>'0'));
            //gán thời gian bắt đầu cho block tiếp theo;
                    $StartTimeOfBlock = $EndTimeOfBlock;
                }
                while ($EndTimeOfBlock!=$CloseTime);

                $arrAppointment = $this->AddDate($ApplyDate);
                $arrKey = array_keys($arrAppointment);
                foreach ($arrKey as $Date) {
                    $arrAppointment = Arr::set($arrAppointment,$Date,$TimeArray);
                }

                $this->setupDatabase();

                $this->database->getReference('ServingHours')
                ->update($arrAppointment);
                return redirect()->back()->with('alert','Cập nhật thành công!!');
            }
        }
        else{
                return redirect()->back()->with('alert','không tồn tại!!');

        }
    }

    // Cac ham xu ly thoi gian 
    public function TimeCalculate($Start, $Close, $Space){
       

        //tách phần hour và min trong một giờ
        $arr_EndTime = explode(":", $Close);
        $EndHour = (int) $arr_EndTime[0];
        $EndMin = (int)$arr_EndTime[1];


        //tách phần hour và min trong một giờ
        $arr_StartTime = explode(":", $Start);
        $hour = (int)$arr_StartTime[0];
        $min = (int)$arr_StartTime[1];

        $hour += floor($Space/60); 
        $min += $Space%60;

        //object để check lại phút có lớn hơn 60 hay không
        $objTime = array(
            'h'=>(int)$hour,
            'm'=>(int)$min
        );
        $objTime=$this->CheckTime($objTime);

        //check block kết thúc
        if($objTime['h']==$EndHour && $objTime['m']>$EndMin){
            $objTime['h']=$EndHour;
            $objTime['m']=$EndMin;
        }

        if($objTime['m']==0)
            $EndTimeOfBlock = $objTime['h'] .":00";
        else
            $EndTimeOfBlock = $objTime['h'] .":". $objTime['m'];

        return $EndTimeOfBlock;
    }

    function CheckTime($obj){
        if($obj['m']>=60){
            $obj['h'] += floor($obj['m']/60);
            $obj['m'] = $obj['m']%60;
        }
        return $obj;
    }

    // ham xu ly ngay 
    function AddDate($startDate){
        $arr_Date = explode("-", $startDate);
        $Day = (int) $arr_Date[0];
        $Month = (int)$arr_Date[1];
        $Year = (int)$arr_Date[2];
        $arr_result = [];

        for ($i=0; $i <30 ; $i++) { 
            $arr_result = Arr::add($arr_result,$Day.'-'.$Month.'-'.$Year,array());

            $CheckVar = (int)$this->CheckDate($Day,$Month,$Year);
            switch ($CheckVar) {
                case 0:{
                    $Day=1;
                    $Month++;
                    break;
                }

                case 1:{
                    $Day=1;
                    $Month=1;
                    $Year++;
                    break;
                }
                case 2:{
                    $Day++;
                    break;
               }
            }
        }

        return $arr_result;
    }

    public function CheckDate($D,$M,$Y){
        if($M==1||$M==3||$M==5||$M==7||$M==8||$M==10||$M==12){
            if($D==31){
                if($M!=12){
                    return $checkResult = 0; //0 - day =1, month+1
                }
                else{
                     return $checkResult = 1; //1- day = 1, month=1, year+1;
                }
            }
            else{
                return $checkResult =2; //2 - day+1;
            }
        }

        if($M==2){
            if($Y%4==0){ //nam nhuan
                if($D == 29){
                    return $checkResult = 0;
                }
            }
            else{ // nam binh thuong
                if($D == 28){
                    return $checkResult = 0;
                }
            }

            return $checkResult = 2;
        }

        else{
            if($D==30){
                return $checkResult = 0; //0 - day =1, month+1
            }
            else{
                return $checkResult =2; //2 - day+1;
            }
        }
        
    }

    // function editDate($num){
    //     if($num<10)
    // }

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
}
