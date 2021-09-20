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
                                <h1 class="h3 mb-0 text-gray-800">Collection</h1>
                                 <a  class="btn add-btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  href="" data-toggle="modal" data-target="#add_farmer"><i class="fa fa-plus"></i> Capture New Delivery</a>
                    </div>

  <div class="col-md-12 table-responsive">

 
       
      

    <table class="table table-bordered table-striped table-sm small " id="users-table">
        <thead>
            <tr>
              <th>Farmer_ID</th>
               <th>Date </th>
              
               <th>Transaction_ID</th>
               <th>Total_cost</th> 
               <th>Total_weight</th>     
               <th>Clerk </th>
                <th>Status</th>
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
         
        ajax: '{!! route('index.collections') !!}',
        columns: [
            { data: 'farmer_id', name: 'farmer_id' },
            { data: 'collection_date', name: 'collection_date' },

            { data: 'transaction_id', name: 'transaction_id' },
            { data: 'total_cost', name: 'total_cost' },
            { data: 'total_weight', name: 'total_weight' },
            { data: 'clerk_id', name: 'clerk_id' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' },
           
        ]
    });
});
</script>
@endpush
      
     


        </div>
     
 @include('clerk.moduleproduce')
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