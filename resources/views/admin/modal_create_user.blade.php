<div id="modaldemo2" class="modal">
      <div class="modal-dialog" role="document">
         {!! Form::open(['method'=> 'post','url' => 'store-users', 'files' => true ]) !!}
         <input type="hidden" value="12345678" name="password">
        <div class="modal-content modal-content-demo ">
          <div class="modal-header ">
            <h6 class="modal-title">New Employee User Creation </h6>
            <button type="button" class="close modelClose" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                           <h6>Capture New User Information Here</h6>
                              <div class="form-group ">
                                   {{ Form::label('email', 'Capture Full  Name') }} 
                                  <input type="text" name="name" class="form-control" required="">
                              </div>
                              <div class="form-group ">
                                   {{ Form::label('email', 'Capture User Email Address') }} 
                                   <input type="email" name="email" class="form-control" required="">
                              </div>
                              <div class="form-group ">
                                   {{ Form::label('email', 'Capture User Role') }} 
                                   <select class="form-control" name="roles[]" multiple >
                                   <option selected value="">Basic User No Role</option>
                                   @if(!empty($roles))
                                      @foreach ($roles as $role)
                                      <option>{{$role->name}}</option>
                                      @endforeach
                                   @endif
                                   </select>

                              </div>



               </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success">Submit </button>
            <button type="button" class="btn btn-outline-danger modelClose" data-dismiss="modal">Close</button>
          </div>
        </div>
          {!!Form::close()!!}
      </div><!-- modal-dialog -->
    </div>