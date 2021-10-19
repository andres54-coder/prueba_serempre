<?php

namespace App\Exports;

use App\Models\client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection,WithHeadings,ShouldAutoSize,ShouldQueue
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return client::all(['cod','name','created_at']);
    }
    public function headings(): array
    {
        return ["code", "name", "fecha de creación"];
    }
}
