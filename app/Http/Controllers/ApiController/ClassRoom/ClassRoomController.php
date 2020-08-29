<?php

namespace App\Http\Controllers\ApiController\ClassRoom;

use App\Repositories\Interfaces\ClassRoomInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    protected $classRoom;

    /**
     * Class Constructor
     *
     * @param ClassRoomInterface $classRoom
     */
    
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
