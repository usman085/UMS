<?php

namespace App\Http\Controllers\ApiController\ClassRoom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ClassRoomInterface;
class ClassRoomController extends Controller
{
    protected $classRoom;
    public function __construct(ClassRoomInterface $classRoom){
        $this->classRoom=$classRoom;
    }
    /**
     * Get All Class Room 
     * 
     * @return response All Class room
     */
    public function getAllClassRoom(){
        return $this->classRoom->getAllClassRoom();
    }
}
