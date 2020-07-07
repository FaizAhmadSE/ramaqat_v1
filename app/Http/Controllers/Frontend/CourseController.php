<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Models\Category;
use App\Models\Course;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Rating;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function onlineCourse(Request $request)
    {
       // dd($request->id);

        if ($request->id){
            $category = Category::where('id',$request->id)->first('name');
            if (!$category) {
                abort(404);
            }
        $data = Course::whereRaw("find_in_set($request->id,category_id)")->paginate(9);

        }else{
            $category = ['name'=>'All'];
            $data = Course::paginate(9);
        }
        return view('course.onlineCourse',compact('data','category'));
    }
    public function course_detail(Request $request)
    {

        if ($request->id) {
            $data = Course::find($request->id);
            if (!$data) {
                abort(404);
            }
            if(Auth::check())
            {
              $rate = Rating::where('course_id',$request->id)->where('user_id',Auth::user()->id)->first();
              $trainer_check = Rating::where('trainer_id',$data->user_id)->where('user_id',Auth::user()->id)->first();
            return view('course.coursedetail', compact('data','rate','trainer_check'));  
            }
            return view('course.coursedetail', compact('data'));  

            
        }
    }
    public function offlineCourse()
    {

    }
    public function completeCourse()
    {
        return view('course.completeCourse');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       // dd($request->all());
        if ($request->hasfile('image')) {
            $postData = $request->only('image');

            $file = $postData['image'];

            $fileArray = array('image' => $file);

            // Tell the validator that this file should be an image
            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
            );

            // Now pass the input and rules into the validator
            $validator = Validator::make($fileArray, $rules);


            // Check to see if validation fails or passes
            if ($validator->fails()) {
                return redirect()->back()->with('alert', 'Upload Image only')->withInput();
            }
            $file = $request->file('image');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $ext = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationpath = public_path('course');
            $file->move($destinationpath, $imgname);
        }
//        dd($imgname);

        $category_id = implode(',', $request->category_id);

        $category = Course::create(['category_id'=>$category_id,'name'=>$request->name,'description'=>$request->description,'duration'=>$request->duration,'price'=>$request->price,'thumbnail'=>$imgname,'user_id'=>Auth::id()]);

        if ($category){
            return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::all();
        return view('backend.trainer.courses.add', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $cate_id = explode(',', $course->category_id);
        $categories = Category::all();
        $check = 0;
        return view('backend.trainer.courses.edit', compact('categories','course','cate_id','check'));
    }
    public function my_course()
    {
        $data = Course::where('user_id',Auth::id());
//        $categories = Category::all();
        return view('course.myCourse',compact('data'));
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
       // dd($request->all());
        $slider = Course::find($request->id);
        if($request->hasfile('image')){

            $postData = $request->only('image');

            $file = $postData['image'];

            $fileArray = array('image' => $file);

            // Tell the validator that this file should be an image
            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
            );

            // Now pass the input and rules into the validator
            $validator = Validator::make($fileArray, $rules);


            // Check to see if validation fails or passes
            if ($validator->fails())
            {
                return redirect()->back()->with('alert','Upload Image only')->withInput();
            }

            $destinationpath=public_path("course/".$slider->image);
            File::delete($destinationpath);
            $file=$request->file('image');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $ext=$file->getClientOriginalExtension();
            $imgname=uniqid().$filename;
            $destinationpath=public_path('course');
            $file->move($destinationpath,$imgname);
        }else{
            $imgname=$slider->thumbnail;

        }

        $category_id = implode(',', $request->category_id);


        $category = Course::where('id',$request->id)->update(['category_id'=>$category_id,'name'=>$request->name,'description'=>$request->description,'duration'=>$request->duration,'price'=>$request->price,'thumbnail'=>$imgname,'user_id'=>Auth::id()]);

        if ($category){
            return redirect(url('trainer/my-courses'));
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
        //

    }
    public function delete(Request $request)
    {
        $id = $request->id;
        Lesson::where('course_id',$id)->delete();
        Course::where('id',$id)->delete();
        return redirect()->back();
    }
}
