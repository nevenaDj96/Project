<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    private  $userInstance;

    public function __construct()
    {
        $this->userInstance=new User();
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'pass'=>'required|min:4',
        ]);
        $email=$request->email;
        $password=md5($request->pass);

        try
        {
            $result=$this->userInstance->with('roles')->where([
                'email'=> $email,
                'password'  => $password,
            ])->get();

            $session=$this->userInstance->where([
                'email'=> $email,
                'password'  => $password,
            ])->get();

            if($result->count() == 1){

                $name=$result[0]['roles']['name'];


                if($name=='user'){
                    session()->put('user', $session);
                    return redirect('/user');
                }

                if($name == 'admin'){
                    session()->put('admin', $session);
                    return redirect('/admin/users');
                }

            }
            else return back()->withInput()->with('fail', 'Sorry, user with that informations does not exists');

        }catch (\Exception $ex){
            \Log::error('Greska prilikom logovanja'. $ex->getMessage());
            return back()->with('fail', 'Sorry, user with that informations does not exists');
        }
        return back();
    }



    public function logout(){
        session()->invalidate();
        return redirect('/');
    }



    public function register(Request $request){
        $request->validate([
            'username' => 'required|email|unique:users,email|max:40',
            'password'=>'required|min:4|max:20',
            'name'=>'required|max:40|unique:users,email',
        ]);

        if($request->password !== $request->password2){
            return back()->withInput()->with('fail','passwords must be equals');
        }
        try {
            $this->userInstance->name=$request->name;
            $this->userInstance->email=$request->username;
            $this->userInstance->password=md5($request->password);
            $this->userInstance->role_id=2;
            $this->userInstance->save();
        }catch (\Exception $ex){

            \Log::error('Greska prilikom registracije'. $ex->getMessage());
            return back()->with('fail', 'We are sorry, try again latter');
        }

        //logovanje nakon registracije

        try
        {
            $result=$this->userInstance->where([
                'email'=> $request->username,
                'password'  => md5($request->password),
            ])->get();

            if($result->count() == 1){
                session()->put('user',$result);
                return redirect('/user');
            }

        }catch (\Exception $ex){
            \Log::error('Greska prilikom logovanja, nakon registracije'. $ex->getMessage());
            return back()->with('fail', 'Now you can login');
        }
        return back();
    }


    //admin
    public function users(){
        $users=$this->userInstance->with('roles')->get();
        return view('admin.home',compact('users'));
    }

    public function destroy($id){

        try{
            $this->userInstance->where('id', $id)->delete();
            return back();
        }catch (\Exception $exception){
            \Log::error('Greska prilikom brisanja korisnika!!!!'. $exception->getMessage());
            dd($exception->getMessage());
            return back();
        }
    }

    public function role($id){
        try{
            $this->userInstance->where('id', $id)->update(['role_id'=>'1']);
            return back();
        }catch (\Exception $exception){
            \Log::error('Greska prilikom menjanja role korisnika!!!!'. $exception->getMessage());
            return back();
        }
    }

    public function roleuser($id){
        try{
            $this->userInstance->where('id', $id)->update(['role_id'=>'2']);
            return back();
        }catch (\Exception $exception){
            \Log::error('Greska prilikom menjanja role korisnika!!!!'. $exception->getMessage());
            return back();
        }
    }
}
