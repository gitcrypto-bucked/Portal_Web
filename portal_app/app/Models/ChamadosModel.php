<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChamadosModel extends Model
{
    use HasFactory;



    public function insert(array $chamados):bool
    {
        if(DB::table('chamados')->insert($chamados))
        {
            return true;
        }
        else return false;
    }

    public function chartChamados($empresa, $centro_de_custo):object
    {
        #return DB::table('chamados')->selectRaw('count(id) as total, status ,created_at as created_at')->whereRaw('active="1" AND empresa="'.$empresa.'"')->groupByRaw('id, status')->orderByRaw("created_at")->get();
        return  DB::table('chamados as c')->selectRaw('count(c.id) as total, c.status ,c.created_at as created_at')
                    ->join('chamados_x_empresa as ac', 'ac.chamadoID', '=', 'c.id')
                    ->whereRaw('c.active="1" AND ac.empresa="'.$empresa.'"  AND ac.centro_de_custo="'.$centro_de_custo.'"')
                    ->groupByRaw('c.id, c.status')->orderByRaw("c.created_at")->get();
    }
}
