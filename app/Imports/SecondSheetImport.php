<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

class SecondSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function collection(Collection $collection)
    {
 
        foreach ($collection as $key => $value) {
            
            if($key > 0 ){
                $order = new Order();
                $order->customer_id  =$value[1];
                $order->date         =$this->transformDate($value[2]);
                $order->time         =$this->transformDate($value[3],'H:i') ;
                $order->amount       =$value[4];
                $order->shop_type    =$value[5];
                $order->save();
            }

        }
    }
}
