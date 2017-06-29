<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Image;
use Validator;

class TestController extends Controller
{
    protected $test;
    public function __construct(Test $test)
    {
        $this->test = $test;
    }

    public function SendMail()
    {
        $data = [
            'title'=>'Saluj lea kehi garxa',
            'description'=>'K garnu, pahila ko nai sakkayexaina'
        ];
        Mail::send('email.sendMail',$data,function($m){
            $m->from('ajaykawan@gmail.com','THis is Test');
            $m->to('saluzmaharjan@gmail.com');
        });
        dd('We are In');
    }

    public function index()
    {
        $data = $this->test->all();
        return view('test.index')->with(compact('data'));
    }

    public function AllIndex(){
        $data = $this->test->all();
        $response = [
            'status'=>200,
            'data'=>json_encode($data)
        ];
        return response($response);
    }

    public function view($id)
    {
        $did = base64_decode($id);

        if($this->test->find($did) == false)
        {
            return view('errors.404');
        }
        $data = $this->test->find($did);
        return view('test.view')->with(compact('data'));
    }

    public function create()
    {
        return view('test.create');
    }

    public function add(Request $request)
    {
        // $er = $this->validate($request,[
        //     'title'=>'required',
        //     'description'=>'required',
        // ]);
        $rules = array(
            'title'  => 'required',
            'description' => 'required',
          'image' => 'required|mimes:jpeg,png,jpg',
          'status'=>'required'
        );
            $v = Validator::make($request->all(), $rules);


        if($v->fails()){
            $messages = $v->messages();

            foreach ($rules as $key => $value)
            {
                $verrors[$key] = $messages->first($key);
            }
               $response = [
                   'status'=>200,
                   'data'=>$verrors,
                   'message'=>'Error'
               ];
               return response($response);
           }

        $data = [
            "title"=>$request->input('title'),
            "description"=>$request->input('description'),
            "image"=>($request->file('image')) ? time().'.'.$request->file('image')->getClientOriginalExtension() : '',
            "status"=>$request->input('status')
        ];
        if($data['image'] != ''){
            if(!file_exists(public_path('admin/thumbnails'))){
                mkdir(public_path('admin/thumbnails'),'0755');
            }
            $image = $request->file('image');
            $thumb_img = Image::make($image->getRealPath());
            $thumb_img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('admin/thumbnails').'/'.$data['image'],100);
            $request->file('image')->move(public_path('admin/images'),$data['image']);
        }
        $this->test->create($data);
        $response = [
            'status'=>200,
            'message'=>'Success'
        ];

        return response($response);
/*        return redirect()->route('tests')->with('flash_success','Test Created Successfully');*/

    }

    public function delete(Request $request){
        $id = $request->id;
        $data = $this->test->find($id);
        if(!empty($data['image'])){
            unlink(public_path('admin/images'.'/'.$data['image']));
            $thumb_exist = public_path('admin/images').'/'.$data['image'];
            unlink(public_path('admin/thumbnails'.'/'.$data['image']));
            $thumb_exist = public_path('admin/thumbnails').'/'.$data['image'];

//            if(file_exists($thumb_exist)){
//                unlink(public_path('admin/thumbnails').'/'.$data['image']);
//            }
        }
        if(is_null($data)){
            $response=[
                'status'=>200,
                'message'=>'error',
                'data'=> 'Id not available'
            ];
            return  response($response);
        }
        //check of it exists or not
        $data->delete();
        $response=[
            'status'=>200,
            'message'=>'Success'

        ];
        return  response($response);

    }
    public function update(Request $request){
        $id = $request->id;
        $data = $this->test->find($id);
        $response=[
            'status'=>200,
            'data'=>json_encode($data)

        ];
        return  response($response);

    }
    public function saveUpdate(Request $request){
//        $data = $request->input();
        $data = [
            "title"=>$request->input('title'),
            "description"=>$request->input('description'),
            "image" => ($request->file('image')) ? time().'.'.$request->image->getClientOriginalExtension() : $request->input('oldImg'),
            "status"=>$request->input('status')
        ];
        $this->test->find($request->input('id'))->update($data);
        if($request->file('image')){
            $image = $request->file('image');
            $thumb_img = Image::make($image->getRealPath());
            $thumb_img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('admin/thumbnails').'/'.$data['image'],100);
            $request->file('image')->move(public_path('admin/images'),$data['image']);
            unlink(public_path('admin/images').'/'.$request->input('oldImg'));
            unlink(public_path('admin/thumbnails').'/'.$request->input('oldImg'));
        }
        $this->test->find($request->input('id'))->update($data);
        $response=[
            'status'=>200,
            'message'=>'Success'

        ];
        return  response($response);


    }
}
