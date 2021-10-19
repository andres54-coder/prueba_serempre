<?php

namespace App\Imports;

use App\Models\client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class ClientImport implements ToModel,WithHeadingRow,SkipsOnError,WithValidation,WithChunkReading
{
    use Importable,SkipsErrors;

    public function rules(): array
    {
        return [
            '*.name'=>'string|max:255',
        ];
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {
        return new client([
            'name'=> $row['name'],
            'cod'=>uniqid(),
            'city_id'=>rand(1,10)
        ]);
    }

    public function chunkSize(): int
    {
        return 100000;
    }

 /*   public function onError(Throwable $error)
    {
    }
      public function onFailure(Failure ...$failure)
   {

   }*/
}
