<div id="add_farmer" class="modal custom-modal fade" role="dialog">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Capture A New Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              
                                  {!! Form::open(['method'=> 'post','url' => 'store-payment', 'files' => true ]) !!}
                              
                                  
                                <div class="row">

                                <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Transactions Ref ', ['class' => 'awesome'])!!}
                                     <select class="form-control" name="transaction_id" required=""> 
                                      <option value="">Select Farmer</option>
                                      @if(!empty($farmers))
                                        @foreach($farmers as $farm)
                                            <option value="{{$farm->transaction_id}}">{{$farm->fname}}  {{$farm->sname}} - {{$farm->transaction_id}}</option>
                                        @endforeach
                                      @endif
                                     </select>
                                </div>

                                <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Payment Date ', ['class' => 'awesome'])!!}
                                     <input type="date" name="paymentdate" value="{{\Carbon\Carbon::today()}}" class="form-control input-sm">
                                </div>
                                   
                             

                                 <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Total Paid ', ['class' => 'awesome'])!!}
                                     <input type="number" step="any" name="total_cost"  class="form-control input-sm">
                                </div>

                             

                                  <div class="form-group col-md-6 center">
                                    {!! Form::label('weight', 'Payment Mode ', ['class' => 'awesome'])!!}
                                     <select class="form-control" name="payment_mode" required=""> 
                                      <option value="">Select Payment Mode</option>
                                      <option>Mobile Money</option>
                                      <option>Cash</option>
                                      <option>Cheque</option>
                                     </select>
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
