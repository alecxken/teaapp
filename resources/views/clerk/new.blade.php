<div id="add_farmer" class="modal custom-modal fade" role="dialog">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Register A New Farmer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              
                                  {!! Form::open(['method'=> 'post','url' => 'store-farmer', 'files' => true ]) !!}
                                 
                                       
                                <div class="row">

                                <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'First Name ', ['class' => 'awesome'])!!}
                                     <input type="text" name="fname" class="form-control input-sm">
                                </div>

                                <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Surname ', ['class' => 'awesome'])!!}
                                     <input type="text" name="sname" class="form-control input-sm">
                                </div>

                                 <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', ' Phone_no ', ['class' => 'awesome'])!!}
                                    <input type="number" name="phone_number" class="form-control input-sm">
                                </div>

                             

                                <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', ' Email Address', ['class' => 'awesome'])!!}
                                    <input type="email" name="email" class="form-control input-sm">
                                </div>

                
                  </div>
                            </div>
                  <div class="modal-footer">
                       {{ Form::submit('Click To Register', array('class' => 'btn btn-success pull-right')) }}

                  </div>
                  {!!Form::close()!!}
              </div>
            </div>
          </div>
