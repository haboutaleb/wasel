<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FirstSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $key => $value) {
            if($key > 0 ){
                $user = new User();
                $user->name = $value[1];
                $user->age = $value[2];
                $user->save();
            }

        }
    
    }
}
