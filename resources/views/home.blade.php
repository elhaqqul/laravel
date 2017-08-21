@extends('header')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <h4 class="page-header">Home > <a href="user">Data User</a></h4>
                </div>

                <div class="col-lg-12">
                	<div class="panel panel-primary">
					  <div class="panel-heading">Form User</div>
					  <div class="panel-body">
					  		<form class="form-horizontal">
					  			<div class="form-group">
					  				<label class="control-label col-lg-2" for="username">Username:</label>
								    <div class="col-lg-10">
								      <input type="text" class="form-control" id="username" name="data[username]" placeholder="Enter Username">
								      <input type="hidden" value="<?php echo csrf_token();?>" name="_token">
								    </div>
					  			</div>

					  			<div class="form-group">
					  				<label class="control-label col-lg-2" for="email">Email:</label>
								    <div class="col-lg-10">
								      <input type="email" class="form-control" id="email" name="data[email]" placeholder="Enter Email">
								    </div>
					  			</div>

					  			<div class="form-group">
					  				<label class="control-label col-lg-2" for="password">Password:</label>
								    <div class="col-lg-10">
								      <input type="password" class="form-control" name="data[password]" id="password">
								    </div>
					  			</div>

					  			<div class="form-group">
					  				<div class="col-lg-offset-2 col-lg-6">
					  					<button class="btn btn-success" type="button">Save</button>
					  				</div>
					  			</div>

					  		</form>
					  </div>
					</div>
                </div>

            </div>


        </div>
    </div>
    <script>
    	$(document).ready(function(){
    		$("button").click(function(){
    			var form = $('form').serialize();
    			$.post('<?php echo URL('save_user');?>',form, function(data){
    				if(data.response == "ok"){
    					alert('Insert Success');
    					$('form').get(0).reset();
    					return false;
    				}else{
    					alert('Insert Error');
    					return false;
    				}
    			},'json');
    		});
    	});
    </script>
@endsection

@extends('footer')