@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><a href="{{URL::to('/students/create')}}" class="btn btn-primary ml-1">Thêm mới</a></h2>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($students as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->birthday}}</td>
                                <td>{{$item->address}}</td>
                                <td>   
                                    <a href="{{URL::to('students/edit',['id'=>$item->id])}}" class="btn btn-outline-primary"> Edit</a>
                                    <a href="{{URL::to('students/delete', ['id'=>$item->id])}}" class="btn btn-outline-danger ml-1" onclick="showModel()">DELETE</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-body">Are you sure to delete this record?</div>
			        <div class="modal-footer">
				        <button type="button" class="btn btn-default" onClick="dismissModel()">Cancel</button>
				        <form id="delete-frm" class="" action="" method="POST">
                        @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
			        </div>
		        </div>
	        </div>
        </div>
    </div>
    <script>
        function showModel(id) {
            var frmDelete = document.getElementById("delete-frm");
            frmDelete.action = 'students/'+id;
            var confirmationModal = document.getElementById("deleteConfirmationModel");
            confirmationModal.style.display = 'block';
            confirmationModal.classList.remove('fade');
            confirmationModal.classList.add('show');
        }
        
        function dismissModel() {
            var confirmationModal = document.getElementById("deleteConfirmationModel");
            confirmationModal.style.display = 'none';
            confirmationModal.classList.remove('show');
            confirmationModal.classList.add('fade');
        }
    </script>
    


@endsection