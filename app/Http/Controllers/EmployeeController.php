<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function getPaymentDay($year, $month, $day)
    {
        $monthMap = [
            'Jan' => '02', 'Feb' => '03', 'Mar' => '04', 'Apr' => '05',
            'May' => '06', 'Jun' => '07', 'Jul' => '08', 'Aug' => '09',
            'Sep' => '10', 'Oct' => '11', 'Nov' => '12', 'Dec' => '01'
        ];

        $fromDate = $year.'-'.$monthMap[$month].'-'.$day;
        $searchDate = new Carbon($fromDate);

        $lastSunday = Carbon::createFromTimeStamp(strtotime("last Sunday", $searchDate->timestamp));
        $lastMonday = Carbon::createFromTimeStamp(strtotime("last Monday", $searchDate->timestamp));
        $lastTuesday = Carbon::createFromTimeStamp(strtotime("last Tuesday", $searchDate->timestamp));
        $lastWednesday = Carbon::createFromTimeStamp(strtotime("last Wednesday", $searchDate->timestamp));
        $lastThursday = Carbon::createFromTimeStamp(strtotime("last Thursday", $searchDate->timestamp));

        $salariesPaymentDay = max($lastSunday , $lastMonday, $lastTuesday, $lastWednesday, $lastThursday)->format('d');
        
        return $salariesPaymentDay;
    }

    public function getPaymentAmount($offset = 1)
    {
        return Employee::sum('salary') * $offset;
    }

}
