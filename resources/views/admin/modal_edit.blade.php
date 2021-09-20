<div id="modal-user" class="modal">
      <div class="modal-dialog" role="document">
         {!! Form::open(['method'=> 'post','url' => 'users_update', 'files' => true ]) !!}
         <input type="hidden" id="task_id" name="id">
            <div class="modal-content modal-content-demo">
               <div class="modal-header">
                    <h6 class="modal-title">Agent App Edit Creation Portal</h6>
                    <button type="button" class="close modelClose" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>
             <div class="modal-body">
   
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', Null, array('id' => 'name','class' => 'form-control', 'readonly')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', Null, array('id' => 'email','class' => 'form-control', 'readonly')) }}
                </div>

                <h5><b>Give Role</b></h5>

                <div class='form-group'>
                  <select class="form-control" name="roles[]" multiple >
                                   <option selected value="">Basic User No Role</option>
                                   @if(!empty($roles))
                                      @foreach ($roles as $role)
                                      <option>{{$role->name}}</option>
                                      @endforeach
                                   @endif
                                   </select>
                </div>
         
          <div class="modal-footer">
            <button type="submit" id="SubmitCreateProductForsm" class="btn btn-outline-success">Submit </button>
            <button type="button" class="btn btn-outline-danger modelClose" data-dismiss="modal">Close</button>
          </div>
        </div>
          {!!Form::close()!!}
      </div><!-- modal-dialog -->
    </div>