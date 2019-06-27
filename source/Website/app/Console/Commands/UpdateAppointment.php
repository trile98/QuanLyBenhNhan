<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use Carbon\Carbon;

use Admin\Http\Controllers\TimeController as TimeController;


class UpdateAppointment extends Command
{
    private $database, $firebase,$TimeVar;

    function setupDatabase(){
       $serviceAccount = ServiceAccount::fromJsonFile(dirname(__DIR__,3).'/app/Http/Controllers/dacna-66ea5-9ee2da1e4e0a.json');
       $this->firebase = (new Factory())
       ->withServiceAccount($serviceAccount)
       ->withDatabaseUri('https://dacna-66ea5.firebaseio.com/')
       ->create();
       $this->database = $this->firebase->getDatabase();
   }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateappointment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return $this->updateDaily();
    }


    /**
     * Delete current date and add new date.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function updateDaily(){
        var_dump(openssl_get_cert_locations());
        
        $this->setupDatabase();

        $currentDate = Carbon::now()->format('d-m-Y');
        $currentDate = $this->changeDateFormat($currentDate);
        $this->database->getReference("ServingHours/".$currentDate)->set(null);
        echo $currentDate;

        $arrayDate = $this->database->getReference('ServingHours')->getValue();

        //xep lai mang va dao nguoc 
        array_reverse( ksort($arrayDate,SORT_NATURAL ));

        if($arrayDate!=null){ 
            foreach ($arrayDate as $key => $value) {
                 $LastDate = $key;
                 break;
            }

            $workingTimeArr = $this->database->getReference('WorkingTime')->getValue();

            $StartTime = $workingTimeArr['StartTime'];
            $CloseTime = $workingTimeArr['CloseTime'];
            $SpaceTime = $workingTimeArr['SpaceTime'];
                   //them ngay moi
            $this->TimeVar = new TimeController();

            $NextDate = $this->CalculateNextDate($LastDate);

            $TimeArray = [];
            $StartTimeOfBlock=$StartTime;
            $EndTimeOfBlock=" ";
             do{
                $EndTimeOfBlock=$this->TimeVar->TimeCalculate($StartTimeOfBlock,$CloseTime,$SpaceTime);

                $TimeArray=Arr::add($TimeArray,$StartTimeOfBlock.'-'.$EndTimeOfBlock,array('isDisable'=> 'false','numberOfRegistration'=>'0'));
                       //gán thời gian bắt đầu cho block tiếp theo;
                $StartTimeOfBlock = $EndTimeOfBlock;
            }while ($EndTimeOfBlock!=$CloseTime);

            $this->database->getReference('ServingHours/'.$NextDate)
                ->set($TimeArray);
        }
    }

    /**
     * change format of date (from 01 to 1)
     *
     * @param  string  $date
     * @return string $date
     */
     function changeDateFormat($date){
        $arr_Date = explode("-", $date);
        $Day = (int) $arr_Date[0];
        $Month = (int)$arr_Date[1];
        $Year = (int)$arr_Date[2];

        return $Day."-".$Month."-".$Year;
    }

    /**
     * calculate next date.
     *
     * @param  string  $date
     * @return string $date
     */
    protected function CalculateNextDate($date){
        $arr_Date = explode("-", $startDate);
        $Day = (int) $arr_Date[0];
        $Month = (int)$arr_Date[1];
        $Year = (int)$arr_Date[2];

        $CheckVar = (int)$this->TimeVar->CheckDate($Day,$Month,$Year);
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

        return $Day."-".$Month."-".$Year;
    }

}
