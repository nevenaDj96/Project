<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class HomeController extends BaseController
{
    private $subscribeInstance;
    public function __construct()
    {
        parent::__construct();

        $this->subscribeInstance=new Subscriber();
    }

    public function autor(){
        return view('unautehnicated.autor',['data' => $this->getData()]);
    }

    public function index(){
       return view('unautehnicated.index',['data' => $this->getData()]);
   }
    public  function dokumentacija(){
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download(public_path('dokumentacija.pdf'), 'dokumentacija.pdf', $headers);

    }
   public function subscribe(Request $request){
        $request->validate([
            'subemail' => 'required|email|unique:subscribers,email',
        ]);

        try{
            $this->subscribeInstance->email=$request->subemail;
            $this->subscribeInstance->save();
            return back()->with('success', 'Thank you for subscribe!');
        }catch (\Exception $ex){
            \Log::error('Greska prilikom subscriba'. $ex->getMessage());
            return back()->with('fail', 'We are sorry, try again latter to subscribe');
        }

   }
   public function show(){
       $sub=$this->subscribeInstance->get();
       return view('admin.subscribe', ['sub' => $sub]);
   }

    public function navbar(){
        return view('admin.navbar', ['nav' => $this->getMenu()]);
    }


    public function navdelete($id){

        try{
            $this->getNavInstance()->where('id', $id)->delete();
            return back();
        }catch (\Exception $exception){
            \Log::error('greska prilikom brisanja navigacije!'.$exception->getMessage());
           // dd($exception->getMessage());
            return back();
        }
    }
    public function navedit($id){
        try{
            $nav=$this->getNavInstance()->where('id', $id)->get();
            return view('admin.editnav',['nav'=>$nav, 'data'=>$this->getData()]);
        }catch (\Exception $exception){
            \Log::error('greska prilikom pozivanja edita navigacije!'.$exception->getMessage());
            // dd($exception->getMessage());
            return back();
        }
    }
        public function navupdate(Request $request){

        try{
            $this->getNavInstance()->where('id', $request->id)->update(['url' => $request->url, 'name'=> $request->name]);
            return redirect('/admin/nav');
        }catch (\Exception $exception){
            \Log::error('greska prilikom pozivanja update navigacije!'.$exception->getMessage());
            return back();
        }
        }


        //
    public function footer(){
        return view('admin.footer', ['footer' => $this->getNetworks()]);
    }
    public function footerdelete($id){

        try{
            $this->getFooterInstance()->where('id', $id)->delete();
            return back();
        }catch (\Exception $exception){
            \Log::error('greska prilikom brisanja futera!'.$exception->getMessage());
            // dd($exception->getMessage());
            return back();
        }
    }
    public function footeredit($id){
        try{
            $nav=$this->getFooterInstance()->where('id', $id)->get();
            return view('admin.editfooter',['nav'=>$nav, 'data'=>$this->getData()]);
        }catch (\Exception $exception){
            \Log::error('greska prilikom pozivanja edita futera!'.$exception->getMessage());
            // dd($exception->getMessage());
            return back();
        }
    }
    public function footerupdate(Request $request){

        try{
            $this->getFooterInstance()->where('id', $request->id)->update(['url' => $request->url, 'name'=> $request->name]);
            return redirect('/admin/footer');
        }catch (\Exception $exception){
            \Log::error('greska prilikom pozivanja update futera!'.$exception->getMessage());
            return back();
        }
    }
        public function footerstore(Request $request){

            try{
                $this->getFooterInstance()->insert(['url' => $request->url, 'name'=> $request->name]);
                return back();
            }catch (\Exception $exception){
                \Log::error('greska prilikom dodavanja u futer!'.$exception->getMessage());
                return back();
            }
        }
    public function navstore(Request $request){

        try{
            $this->getNavInstance()->url = $request->url;
            $this->getNavInstance()->name = $request->name;
            $this->getNavInstance()->save();
            return back();
        }catch (\Exception $exception){
            \Log::error('greska prilikom dodavanja u navigacioni meni!'.$exception->getMessage());

            return back();
        }
    }
}
