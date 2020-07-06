<?php
namespace App\Repositories;

use App\Repositories\Interfaces\ProgramInterface;
use App\Models\Program;

class ProgramRepository implements ProgramInterface{
    
    public function insertProgram($request)
    {
        $program= Program::create($request->all());
        return response(['Program'=> $program],200);
    }
    public function getProgram()
    {
        $getProgram=Program::all();
        return response(['allProgram'=>$getProgram],200);
    }
}