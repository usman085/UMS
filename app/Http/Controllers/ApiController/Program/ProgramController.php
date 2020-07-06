<?php

namespace App\Http\Controllers\ApiController\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProgramInterface;

class ProgramController extends Controller
{
       protected $programRepository;
    
    /**
     * Class Constructor
     *
     * @param programRepository Class
     * @return void
     */
    public function __construct(programInterface $programInterface)
    {
        $this->programRepository=$programInterface;
    }
    /**
     * Insert Course 
     * 
     * @param Illuminate\Http\Request
     * 
     * @return Response 
     */
    public function insertProgram(Request $request)
    {
        return $this->programRepository->insertProgram($request);
    }  /**
     * Get program 
     * 
     * 
     * 
     * @return Response  All program
     */
    public function getProgram(){
        return $this->programRepository->getProgram();
    }

}