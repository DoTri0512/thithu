@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="rows">
            <div class="col-md-10">
                <h2>Thêm mới sinh viên</h2>
                <form action="" method="post" class="border p-3 mt-2">
                    @if($errors->any())
                        <div class="alert alert-danger text-center">
                            <p>Vui lòng kiểm tra lại dữ liệu</p>
                        </div>
                    @endif
                    <div class="control-group col-6 text-left mt-2">
                        <label for="">Fullname</label> <br>
                        <input type="text" name="fullname" class="control-group mb-4">
                        @error('fullname')
                            <p style='color:red'>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="control-group col-6 text-left mt-2">
                        <label for="">Address</label> <br>
                        <input type="text" name="address" class="control-group mb-4">
                        @error('address')
                            <p style='color:red'>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="control-group col-6 text-left mt-2">
                        <label for="">Birthday</label> <br>
                        <input type="date" name="birthday" class="control-group mb-4">
                        @error('birthday')
                            <p style='color:red'>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="control-group col-6 text-left mt-2">
                        <button class="btn btn-primary">Thêm mới</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection