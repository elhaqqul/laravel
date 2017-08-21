@extends('header')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <h4 class="page-header"><a href='./'>Home</a> > Data User</h4>
                </div>

                <div class="col-lg-12">
                	<div class="panel panel-primary">
					  <div class="panel-heading">Data User</div>
					  <div class="panel-body">
					  	 <table class="table table-responsive">
					  	 	<thead>
					  	 		<tr>
					  	 			<th>Username</th>
					  	 			<th>Email</th>
					  	 			<th>Password</th>
					  	 			<th>Action</th>
					  	 		</tr>
					  	 	</thead>
					  	 	<tbody>
					  		<?php 
					  		if(count($user)){
					  			foreach ($user as $key => $value) {
					  		?>
					  				<tr>
					  					<td><?php echo $value['username'];?></td>
					  					<td><?php echo $value['email'];?></td>
					  					<td><?php echo $value['password'];?></td>
					  					<td>
					  						<a href="javascript:void(0)" data="<?php echo $value['id'];?>" class="btn btn-danger rem"><i class="fa fa-remove"></i> Delete</a>
					  						<a href="javascript:void(0)" data="<?php echo $value['id'];?>" class="btn btn-primary up"><i class="fa fa-pencil"></i> Update</a>
					  					</td>
					  				</tr>
					  		<?php
					  			}
					  		}else{
					  			echo "<tr><td colspan='4' align='center'>Data Tidak Ditemukan</td></tr>";
					  		}
					  		?>
					  		</tbody>
					  	  </table>
					  </div>
					</div>
                </div>
                <script>
					$(document).ready(function(){
						$(".rem").click(function(){
							var id=$(this).attr('data');
							$.get('<?php echo URL('delete');?>/'+id, function(data){
								if(data.response == "ok"){
									alert('Delete Success');
									location.reload();
								}else{
									alert('Delete Failed');
									location.reload();
								}
							},'json');
						});

						$(".up").click(function(){
							//$("#myModal").modal();
							var id=$(this).attr('data');
							$.get('<?php echo URL('update');?>/'+id, function(data){
								if(data.response == "ok"){
									$('[name="username"]').val(data.users.username);
									$('[name="email"]').val(data.users.email);
									$('[name="password"]').val(data.users.password);
									$('[name="id"]').val(id);
									$("#myModal").modal();
								}else{
									
								}
							},'json');
						});

						$("#myModal").on('hidden.bs.modal', function () {
						$('form input').each(function(){
							if($(this).attr('name') != "_token"){
								$(this).val('');
							}
						});
					});

						$("#sv").click(function(){
							var form = $('form').serialize();
							$.post('<?php echo URL('updateData');?>', form, function(data){
								if(data.response == "ok"){
									alert('Update Success');
									location.reload();
								}
							},'json');
						});
				});
				</script>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div id="myModal" class="modal fade" data-backdrop="static" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        	<form class="form-horizontal">
        		<div class="form-group">
        			<label class="contorl-label col-lg-3">Username</label>
        			<div class="col-lg-8">
        				<input type="text" class="form-control" value="" name="username"> 
        				<input type="hidden" value="<?php echo csrf_token();?>" name="_token"> 
        				<input type="hidden" name="id">
        			</div>
        		</div>

        		<div class="form-group">
        			<label class="contorl-label col-lg-3">Email</label>
        			<div class="col-lg-8">
        				<input type="text" class="form-control" value="" name="email"> 
        			</div>
        		</div>

        		<div class="form-group">
        			<label class="contorl-label col-lg-3">Password</label>
        			<div class="col-lg-8">
        				<input type="password" class="form-control" value="" name="password"> 
        			</div>
        		</div>

        		<div class="form-group">
        			<div class="col-lg-offset-3 col-lg-8">
        				<button type="button" class="btn btn-primary" id="sv">Save</button>
        			</div>
        		</div>
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection

@extends('footer')
