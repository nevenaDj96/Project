<?php

namespace App\Http\Controllers;

use foo\bar;
use Illuminate\Http\Request;
use App\Contact;
class ContactController extends BaseController
{
    private $contactInstance;
    public function __construct()
    {
        parent::__construct();
        $this->contactInstance=new Contact();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('unautehnicated.contact',['data'=>$this->getData()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
           'name' => 'required|min:3',
            'email' => 'email|required',
            'subject' =>'required|min:3',
            'message'=>'required|min:5',
        ]);

        try{
            $this->contactInstance->name= $request->name;
            $this->contactInstance->email= $request->email;
            $this->contactInstance->subject=$request->subject;
            $this->contactInstance->message=$request->message;
            $this->contactInstance->save();
            return back();
        }catch (\Exception $ex){
                \Log::error('greska prilikom slanja contact poruke' .$ex->getMessage()  ." Name:". $request->name . " Message:" .$request->message);

                return back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
            $contact=$this->contactInstance->get();
            return view('admin.contact', ['contact'=>$contact]);

    }

   
    public function destroy($id)
    {
        try{
        $this->contactInstance->where('id', $id)->delete();
        return back();
        }catch (\Exception $exception){
            \Log::error('greska prilikom brisanja konakta iz admin pane;la');
            return back();
        }
    }
}
