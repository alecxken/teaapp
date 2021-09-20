  
@extends('layouts.template')
@section('content')
 
				<!-- Page Content -->
                <div class="content container-fluid">

                	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Roles Management</h1>
                        
                                 <a  class="btn add-btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  href="{{url('create_user')}}"  ><i class="fa fa-plus"></i> Add New User</a>

                                 <a  class="btn add-btn d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  href="" data-toggle="modal" data-target="#add-permissions"><i class="fa fa-plus"></i> Add Permissions</a>


                                 <a  class="btn add-btn d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"  href="" data-toggle="modal" data-target="#add_roles"><i class="fa fa-plus"></i> Add New Roles</a>


                               
                    </div>

				 <div class="col-md-12">
			
					<!-- Page Header -->
				
					<!-- /Page Header -->
					
					<div class="row">
					<!-- 	<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
							
							<div class="roles-menu">
								<ul>
									@if(!empty($roles))
									@foreach($roles as $r)
									<li class="">
										<a href="javascript:void(0);">{{$r->name}}
											<span class="role-action">
												<span class="action-circle large" data-toggle="modal" data-target="#edit_role">
													<i class="material-icons">edit</i>
												</span>
												<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
													<i class="material-icons">delete</i>
												</span>
											</span>
										</a>
									</li>
									@endforeach
									@endrole
									
								</ul>
							</div>
						</div> -->
						<div class="col-sm-12">
							@if(!empty($roles))
									@foreach($roles as $r)
							<h6 class="card-title m-b-20">{{$r->name}} Role Permissions</h6>
							<div class="m-b-30">
								<ul class="list-group notification-list">
									@php $access = str_replace(array('[',']','"'),'', $r->permissions()->pluck('name'));@endphp
									@foreach(explode(',',$access) as $title)
									<li class="list-group-item">
										{{$title}}
										<div class="status-toggle">
											<input type="checkbox" id="staff_module" class="check" checked>
											<label for="staff_module" class="checktoggle" ></label>
										</div>
									</li>
									@endforeach
									
									
								</ul>
							</div>  
							@endforeach
							@endif    	
						
						</div>
					</div>
                </div>
                   </div>
				<!-- /Page Content -->
				
				<!-- Add Role Modal -->
			
				<!-- /Add Role Modal -->
				
				<!-- Edit Role Modal -->
				<div id="edit_role" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-md">
							<div class="modal-header">
								<h5 class="modal-title">Edit Role</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label>Role Name <span class="text-danger">*</span></label>
										<input class="form-control" value="Team Leader" type="text">
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Role Modal -->

				<!-- Delete Role Modal -->
				<div class="modal custom-modal fade" id="delete_role" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Role</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Role Modal -->
				
          

             @include('admin.add-role')

             @endsection