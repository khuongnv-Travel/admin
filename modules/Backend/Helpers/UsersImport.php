<?php

namespace Modules\Backend\Helpers;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\Backend\Models\ListModel;


class UsersImport implements FromCollection
{
    public function collection()
    {
        return ListModel::all();
    }
}