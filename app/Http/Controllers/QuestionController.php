<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class QuestionController extends BaseController
{
    private $questionInstance;

    public function __construct()
    {
        parent::__construct();
        $this->questionInstance=new Question();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('admin')){
            $questions=$this->questionInstance->orderBy('answer', 'asc')->get();
            return view('admin.questions', compact('questions'));
        }
        else {
            $questions=$this->questionInstance->where('answer','NOT LIKE',null)->paginate(4);
        }

        if($request->ajax()){
            return view('ajax.question', ['questions' => $questions])->render();
        }

        return view('unautehnicated.questions',['data' => $this->getData(), 'questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    try{
    $this->questionInstance->where('id', $request->id)->update(['answer'=>$request->answer]);
    return back();
    }catch (\Exception $exception){
        \Log::error('problem prilikom odgovaranja na pitanje');
        return back();
    }

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
            'quesiton' => 'required|min:4'
        ]);
        try{
            $this->questionInstance->question=$request->quesiton;
            $this->questionInstance->save();
            return back();
        }catch (\Exception $ex){
            \Log::error('problem prilikom postavljanja pitanja'. $ex->getMessage() . $request->quesiton);
            return back();
        }
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try{
            $this->questionInstance->find($id)->delete();
            return back();
        }catch (\Exception $exception){
            dd($exception);
            return back();
        }
    }
}
