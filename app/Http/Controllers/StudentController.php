<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class StudentController extends Controller
{
    // public function index(){
    //     return view('student');

    // }
    public function index(Request $request)
    {
        $students = Student::all();
        return view('student',compact('students'));
    }
    public function addStudent(){
        $url = url('/student');
        $title ="Student Registration";
        $student=new Student();
        $data = compact('url','title','student');
        return view('addStudent')->with($data);
    }
    public function store(Request $request)
    {

        $request->validate(
            [
                'studentName' => 'required',
                'fatherName' => 'required',
                'courseTitle' => 'required',
                'email' => 'required|email',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',

                
            ]

        );




        
        
       /* $file = $request->image;
        $imageName = time().'.'.$file->extension();  
         
        $request->image->move(public_path('images'), $imageName);
*/

        $student = new Student();
        if($request->hasFile('image'))
        {
           
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            // $uploadApi = new UploadApi();
            // $result = $uploadApi->upload($file->getRealPath());
            // $url = $result['secure_url'];
            
            $filename = time().".".$ext;
            $file->move('images/',$filename);
            $student->image = $filename; 
        }

        // $student->image =$imageName; 



    
        $student->studentName = $request['studentName'];
        $student->fatherName = $request['fatherName'];
        $student->courseTitle = $request['courseTitle'];
        $student->email = $request['email'];
        $student->save();
       


        return redirect('/students')->with('status','Record created successfully');



    }
    public function edit(Request $request ,$id){
        $student = Student::find($id);
        
        if(is_null($student))
        {
            //if coustomer not found.
            return redirect('students')->with('status','Record Not Found');
        }
        else {

            $url = url('student/edit')."/". $id;
            $title = "Update Student";
            $data = compact('student','url','title');
            return view('editStudent')->with($data);
        }

    }
    public function update(Request $request, $id){
        $student = Student::find($id);
        $request->validate(
            [
                'studentName' => 'required',
                'fatherName' => 'required',
                'courseTitle' => 'required',
                'email' => 'required|email',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',

                 
            ]

        );
//
        if($request->hasFile('image'))
        {
           
            $path = 'images/'.$student->image;
            if (File::exists($path)) 
            {
                File::delete($path);
            }
            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move('images/',$filename);
            $student->image = $filename; 
        
        
        }

        // $file = $request->image;
        // $imageName = time().'.'.$file->extension();  
         
        // $request->image->move(public_path('images'), $imageName);
        // $student->image =$imageName; 


        $student->studentName = $request['studentName'];
        $student->fatherName = $request['fatherName'];
        $student->courseTitle = $request['courseTitle'];
        $student->email = $request['email'];
        $student->update();
       


        return redirect('/students')->with('status','Record Updated Successfully');


    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $path = 'images/'.$student->image;
        if (File::exists($path)) {
            
            File::delete($path);
        }
        $student->delete();
        return redirect('students')->with('status','Student Deleted successfully');


    }
}
