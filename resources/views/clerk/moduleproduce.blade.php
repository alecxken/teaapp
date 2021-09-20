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
              
                                  {!! Form::open(['method'=> 'post','url' => 'store-collection', 'files' => true ]) !!}
                                 @php  $random = substr(md5(mt_rand()), 0, 7); @endphp
                                    <input type="hidden" name="transaction_id" value="{{$random ?? ''}}" class="form-control input-sm">    
                                <div class="row">

                                <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Farmers  Name ', ['class' => 'awesome'])!!}
                                     <select class="form-control" name="farmer_id" required=""> 
                                      <option value="">Select Farmer</option>
                                      @if(!empty($farmers))
                                        @foreach($farmers as $farm)
                                            <option value="{{$farm->id}}">{{$farm->fname}}  {{$farm->sname}}</option>
                                        @endforeach
                                      @endif
                                     </select>
                                </div>

                                <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Collection Date ', ['class' => 'awesome'])!!}
                                     <input type="date" name="collection_date" value="{{\Carbon\Carbon::today()}}" class="form-control input-sm">
                                </div>
                                   
                             

                                 <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Total Cost ', ['class' => 'awesome'])!!}
                                     <input type="number" step="any" name="total_cost"  class="form-control input-sm">
                                </div>

                                <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Total Weight ', ['class' => 'awesome'])!!}
                                     <input type="number" step="any" name="total_weight"  class="form-control input-sm">
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
