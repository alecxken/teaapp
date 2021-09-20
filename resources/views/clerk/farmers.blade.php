@extends('layouts.template')
@section('extracss')
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('extrajs')
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<!--   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
 -->
@endsection
@section('content')

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Farmers</h1>
                                 <a  class="btn add-btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  href="" data-toggle="modal" data-target="#add_farmer"><i class="fa fa-plus"></i> Register New Farmer</a>
                    </div>

  <div class="col-md-12 table-responsive">

 
       
      

    <table class="table table-bordered table-striped table-sm small " id="users-table">
        <thead>
            <tr>
              <th>#</th> 
               <th>First Name</th>
               <th>Surname</th>
               <th>Mobile No</th> 
               <th>Email</th>     
               <th>status</th>
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
         
        ajax: '{!! route('index.farmers') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'fname', name: 'fname' },
            { data: 'sname', name: 'sname' },
            { data: 'phone_number', name: 'phone_number' },
            { data: 'email', name: 'email' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'item_desc' },
           
        ]
    });
});
</script>
@endpush
      
     


        </div>
     
 @include('clerk.new')
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
                url: "get-beneficiary-info/"+id,
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


</script>

  @endsection