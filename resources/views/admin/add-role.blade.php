    <!-- Add Contact The Modal -->
    <div class="modal fade" id="add_roles">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Add New Permission</h4>

                      {{ Form::open(['method'=> 'post','url' => 'permissions_store']) }}
                                        
                    
                   
              
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Add Role Name">
                    </div>
                    <div class="input-group mb-3">
                             @if(!$roles->isEmpty())
                                
                                   <h4>Assign Permission to Roles</h4>

                                  @foreach ($roles as $role)
                                      {{ Form::checkbox('roles[]',  $role->id ) }}
                                      {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                  @endforeach
                              @endif
                    </div>
                  
                    <button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3"
                        data-dismiss="modal">Cancel</button>
                    <button type="submit"
                        class="btn btn-success  button-1 text-white ctm-border-radius float-right">Submit</button>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
    <!-- Add a Key Date Modal-->
    


<div  class="modal  fade" tabindex="-1" role="dialog" id="add-permissions">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
                 <div class="modal-header">
                    <h4 class="modal-title"> Roles</h4>
                 </div>
                  {{ Form::open(array('url' => 'roles_store')) }}
                   <div class="modal-body">
                
                           <div class="box-body">

                       
                          @csrf
                              <div class="form-group">
                                  {{ Form::label('name', 'Name') }}
                                  @if ($errors->has('name'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                                  {{ Form::text('name', null, array('class' => 'form-control')) }}
                              </div>

                              <h5><b>Assign Permissions</b></h5>

                              <div class='form-group'>
                                  @foreach ($permissions as $permission)
                                      {{ Form::checkbox('permissions[]',  $permission->id ) }}
                                      {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                                  @endforeach
                              </div>

                    </div>
                  </div>
            
            <div class="modal-footer">
               <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success center">Submit </button>
            </div>
              {!!Form::close()!!}
        </div>
     </div>
</div>
