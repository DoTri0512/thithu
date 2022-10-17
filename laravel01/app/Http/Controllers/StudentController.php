<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_student()
    {
        //
        $students = Student::all();
        return view('student.list', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'fullname' => 'required|min:4|max:20',
            'address' => 'required|min:4|max:20',
            'birthday' => 'required|'
        ];
        $messages = [
            'fullname.required' => 'Tên sinh viên bắt buộc phải nhập',
            'fullname.min' => 'Tên sinh viên phải lớn hơn :min ký tự',
            'fullname.max' => 'Tên sinh viên phải nhỏ hơn :max ký tự',
            'address.required' => 'Địa chỉ sinh viên bắt buộc phải nhập',
            'address.min' => 'Địa chỉ sinh viên phải lớn hơn :min ký tự',
            'address.max' => 'Địa chỉ sinh viên phải nhỏ hơn :max ký tự',
            'birthday.required' => 'Ngày sinh sinh viên bắt buộc phải nhập',
        ];
        $request->validate($rules,$messages);
        
        $addNew = Student::create([
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
        return redirect("/students/list");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_student_by_id($id){
        $data = Student::find($id);
        return view('student.student_edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $rules = [
            'fullname' => 'required|min:4|max:20',
            'address' => 'required|min:4|max:20',
            'birthday' => 'required|'
        ];
        $messages = [
            'fullname.required' => 'Tên sinh viên bắt buộc phải nhập',
            'fullname.min' => 'Tên sinh viên phải lớn hơn :min ký tự',
            'fullname.max' => 'Tên sinh viên phải nhỏ hơn :max ký tự',
            'address.required' => 'Địa chỉ sinh viên bắt buộc phải nhập',
            'address.min' => 'Địa chỉ sinh viên phải lớn hơn :min ký tự',
            'address.max' => 'Địa chỉ sinh viên phải nhỏ hơn :max ký tự',
            'birthday.required' => 'Ngày sinh sinh viên bắt buộc phải nhập',
        ];
        $request->validate($rules,$messages);
        $data = Student::find($id);
        $data->fullname = $request->fullname;
        $data->birthday = $request->birthday;
        $data->address = $request->address;
        $data->update();
        return redirect("/students/list");

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
        $data= Student::find($id);
        $data->delete();
        return redirect("/students/list");
    }
}
