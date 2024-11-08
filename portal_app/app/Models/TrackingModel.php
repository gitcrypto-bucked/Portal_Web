<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrackingModel extends Model
{
    use HasFactory;

    public function chartTracking($empresa, $centro_de_custo):object
    {

        if($centro_de_custo=='')
        {
            $object=  DB::table('tracking as t')->selectRaw('count(t.id) as total, st.descricao ,t.created_at as created_at')
                ->join('StatusTracking as st', 'st.code', '=', 't.status')
                ->whereRaw('t.active="1" AND t.empresa="'.$empresa.'"')
                ->groupByRaw('t.id, t.status, st.descricao')->orderByRaw("t.created_at")->get();
        }
        else
        {
            $object=  DB::table('tracking as t')->selectRaw('count(t.id) as total, st.descricao ,t.created_at as created_at')
                ->join('StatusTracking as st', 'st.code', '=', 't.status')
                ->whereRaw('t.active="1" AND t.empresa="'.$empresa.'"  AND t.centro_de_custo="'.$centro_de_custo.'"')
                ->groupByRaw('t.id, t.status, st.descricao')->orderByRaw("t.created_at")->get();
        }
        return $object;
    }
}
