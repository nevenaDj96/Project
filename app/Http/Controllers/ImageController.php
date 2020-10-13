<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Anketa;
Use App\Like;

class ImageController extends BaseController
{
    private $imageInstance;
    private $anketaInstance;
    private $likeInstance;
    public function __construct()
    {
    parent::__construct();
    $this->imageInstance=new Image();
    $this->anketaInstance=new Anketa();
    $this->likeInstance=new Like();
    }
    public function user(Request $request){

        $sesija=$request->session()->get('user');
        $images=$this->imageInstance->where('user_id', $sesija[0]['id'])->get();
        return view('user.profile',['data' => $this->getData(), 'images' => $images]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $images=$this->imageInstance->with('users')->orderBy('likes', 'desc')->paginate(6);

              if($request->ajax()){
                  return view('ajax.photos', ['photos' => $images])->render();
              }
        if($request->session()->has('admin')){
            return view('admin.photos', compact('images'));
        }
        return view('unautehnicated.photos',['data' => $this->getData(), 'photos' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sesija=$request->session()->get('user');
       try{
           $provera=$this->anketaInstance->where(['user_id'=>$sesija[0]['id'],'img_id'=>$request->imgid])->get();

            if($provera->count() !== 0){
                return 0;
            }
            else {
                $this->anketaInstance->user_id = $sesija[0]['id'];
                $this->anketaInstance->img_id = $request->imgid;
                $this->anketaInstance->ocena = $request->ocena;
                $this->anketaInstance->save();

                $rez=$this->anketaInstance->where('img_id','like',$request->imgid)->avg('ocena');

                return response($rez,200);
            }

       }catch (\Exception $ex){
           \Log::error('Greska prilikom upisa u anketu'. $ex->getMessage());
        return 0;
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

            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'heading'=> 'required|min:5|regex:/^[A-Z]{1,}/',
            'paragraph'=>'required|min:5',

        ]);
        $sesija=$request->session()->get('user');


        $imageName = time() . '_' . request()->image->getClientOriginalName();

      try{
          request()->image->move(public_path('images'), $imageName);

          $this->imageInstance->img_name = $imageName;
          $this->imageInstance->heading=$request->heading;
          $this->imageInstance->paragraph=$request->paragraph;
          $this->imageInstance->user_id=$sesija[0]['id'];
          $this->imageInstance->likes=0;
          $this->imageInstance->save();

          return back()
              ->with('success', 'You have successfully upload image.');
      }catch (\Exception $ex){
          \Log::error('Greska prilikom dodavanja posta'. $ex->getMessage());
          dd($ex->getMessage());
          return back()
              ->with('fail', 'We are sorry, try again later.');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $podaci=$this->imageInstance->where('id', $id)->get();
        $rez=$this->anketaInstance->where('img_id',$id)->avg('ocena', 3);

        $sesija=$request->session()->has('user');
        if($sesija === false){

            return view('unautehnicated.image', ['data' => $this->getData(), 'podaci' => $podaci, 'rez' => $rez]);
        }
        else{

            $sesija=$request->session()->get('user');

            $isliked=$this->likeInstance->where(['user_id'=>$sesija[0]['id'], 'img_id'=>$id])->first();

            if($isliked===null){
                return view('unautehnicated.image', ['data' => $this->getData(), 'podaci' => $podaci, 'rez' => $rez,'like'=> 0]);
            }
            else{
                return view('unautehnicated.image', ['data' => $this->getData(), 'podaci' => $podaci, 'rez' => $rez,'like'=>1]);
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $podaci=$this->imageInstance->where('id', $id)->get();
        return view('user.edit', ['data' => $this->getData(), 'podaci' => $podaci]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'heading'=> 'required|min:5|regex:/^[A-Z]{1,}/',
            'paragraph'=>'required|min:5',
            ]);
        $sesija=$request->session()->get('user');
        if(isset($request->image)){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            try{
                $oldimage=$this->imageInstance->select('img_name')->where(['id' => $request->id, 'user_id' => $sesija[0]['id']])->get();
                $imageName = time() . '_' . request()->image->getClientOriginalName();
                unlink(public_path() ."/images/".$oldimage[0]['img_name']);

                request()->image->move(public_path('images'), $imageName);
                $this->imageInstance->where(['id' => $request->id, 'user_id' => $sesija[0]['id']])->update([
                    'img_name' => $imageName,
                    'heading' => $request->heading,
                    'paragraph' =>$request->paragraph,
                ]);
                return redirect()->action('ImageController@user')->with('success', 'You have successfully update post.');
            }catch (\Exception $ex){
                \Log::error('Greska prilikom update posta i menjanja fotke'. $ex->getMessage());
                return back()->with('fail', 'We are sorry, try again later.');
            }
        }
        try{
            $this->imageInstance->where(['id' => $request->id, 'user_id' => $sesija[0]['id'] ])->update([
                'heading' => $request->heading,
                'paragraph' =>$request->paragraph,
            ]);
            return redirect()->action('ImageController@user')->with('success', 'You have successfully update post.');
        }catch (\Exception $ex){
            return back()
                ->with('fail', 'We are sorry, try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
           $sesija=$request->session()->get('user');

        try{
            $oldimage=$this->imageInstance->select('img_name')->where(['id' => $request->id, 'user_id' => $sesija[0]['id']])->get();
            //dd(public_path() ."/images/".$oldimage[0]['img_name']);
            unlink(public_path() ."/images/".$oldimage[0]['img_name']);

            $this->imageInstance->where(['id' => $request->id, 'user_id' => $sesija[0]['id']])->delete();
            return back()->with('success', 'You have successfully deleted post');
        }catch (\Exception $ex){
            \Log::error('Greska prilikom brisanja posta'. $ex->getMessage());
            return back()->with('fail', 'try again later');
        }
    }
    public function destroyimgadmin(Request $request,$id)
    {

        try{
            $oldimage=$this->imageInstance->select('img_name')->where('id', $request->id)->get();

            unlink(public_path() ."/images/".$oldimage[0]['img_name']);

            $this->imageInstance->where('id', $request->id)->delete();
            return back()->with('success', 'You have successfully deleted post');
        }catch (\Exception $ex){
            \Log::error('Greska prilikom brisanja posta'. $ex->getMessage());
            return back()->with('fail', 'try again later');
        }
    }
    public function like(Request $request){
        try{
        $sesija=$request->session()->get('user');
        $this->imageInstance->where('id',$request->imgid)->increment('likes');
        $this->likeInstance->insert(['user_id'=>$sesija[0]['id'], 'img_id'=>$request->imgid]);
        return 1;
        }catch (\Exception $exception){
            return 2;
        }
    }
    public function unlike(Request $request){
        try{
            $sesija=$request->session()->get('user');
            $this->imageInstance->where('id',$request->imgid)->decrement('likes');
            $this->likeInstance->where(['user_id'=>$sesija[0]['id'], 'img_id'=>$request->imgid])->delete();
            return 1;
        }catch (\Exception $exception){
            return 2;
        }
    }

    //admin
    public function showvote(){
        $votes=$this->anketaInstance->with('users','images')->orderby('img_id')->get();
        return view('admin.votes', ['votes'=>$votes]);
    }
}
