<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navigation;
use App\Networks;
use App\Image;
use App\User;
class BaseController extends Controller
{
    private $data;
    private $menu;
    private $networks;
    private $imageInstance;
    private $userInstance;

    public function __construct()
    {
        $this->menu=new Navigation();
        $this->networks=new Networks();
        $this->imageInstance=new Image();
        $this->userInstance=new User();

        $this->data['menu']=$this->getMenu();
        $this->data['network']=$this->getNetworks();
        $this->data['images']=$this->getSixImages();
        $this->data['likes']=$this->getLikes();
        $this->data['numberofusers']=$this->getNumberOfUsers();
        $this->data['numberofimages']=$this->getNumberOfImages();
    }


    public function getMenu(){
        return $data['menu']=$this->menu->get();
    }


    public function getNetworks(){
        return $data['network']=$this->networks->get();
    }

    public function getSixImages(){

        return $this->imageInstance->with('users')->orderBy('likes', 'DESC')->take(6)->get();
    }

    public function getLikes(){
        return $this->imageInstance->sum('likes');
    }
    public function getNumberOfUsers(){
        return $this->userInstance->get()->count();
    }
    public function getNumberOfImages(){
        return $this->imageInstance->get()->count();
    }

    public function getData(){
        return $this->data;
    }

    public function getUserInstance(){
        return $this->userInstance;
    }
    public function getFooterInstance(){
        return $this->networks;
    }
    public function getNavInstance(){
        return $this->menu;
    }

}
