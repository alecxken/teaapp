@extends('layouts.template')
@section('extracss')
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('extrajs')
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

@endsection
@section('content')

 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                        
                                 <a  class="btn add-btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  href="" data-toggle="modal" data-target="#modaldemo2"><i class="fa fa-plus"></i> Add New User</a>
                    </div>


  <div class="col-md-12 table-responsive">

 
       
      

    <table class="table table-bordered table-striped table-sm small " id="users-table">
        <thead>
            <tr>
              <th>#</th> 
               <th>User Name</th>
               <th>Email Address</th>
               <th>User Roles </th>     
              <th>Action</th>   
            </tr>
        </thead>
    </table>

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
         order: [[0, 'desc']],
         
        ajax: '{!! route('get.users') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role', name: 'role' },
            { data: 'action', name: 'item_desc' },
           
        ]
    });
});
</script>
@endpush
      
      @include('admin.modal_create_user')
       @include('admin.modal_edit')

        </div>
  

      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
           <script type="text/javascript">

           $('.modelClose').on('click', function(){
            $('#modal-user').hide();
        });
        var id;
        $('body').on('click', '#getEditProductData', function(e) {
            e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id =  $(this).val();
            $.ajax({
                url: "get-user-info/"+id,
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(data) {
                 
                    console.log(data);
                    $('#task_id').val(data.id);         
                    $('#name').val(data.name); 
                    $('#email').val(data.email);   
                     $('#modal-user').show();                                
                    
                }
            });
        });


   $('#SubmitCreateProductForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
        var csrf = $('input[name="_token"]').val();
        $.ajax({
           
                type:'POST',
                url:'/users_update',
                data: {
                    id: $('#id').val(),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    roles: $('#roles').val(),
                    csrf: $('input[name="_token"]').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        setInterval(function(){ 
                            $('.alert-success').hide();
                            $('#CreateProductModal').modal('hide');
                            location.reload();
                        }, 2000);
                    }
                }
            });
        });
</script>
    <script type="text/javascript">

</script>
  
  @endsection