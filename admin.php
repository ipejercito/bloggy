<?php
	include_once("assets/includes/header.php");
?>
<div class="width_holder" ng-app>
	<ul class="nav nav-tabs nav-justified">
		<li class="active">
			<a data-toggle="tab" href="#home">HOME</a>
		</li>
		<li>
			<a data-toggle="tab" href="#login">LOG IN</a>
		</li>
		<li>
			<a data-toggle="tab" href="#register">REGISTER</a>
		</li>
	</ul>
	<div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <h1>Home</h1>
        </div>
        <div class="tab-pane fade" id="login" ng-controller="ng_login_controller" >
			<form class="form-horizontal form_style" enctype="multipart/form-data" novalidate="novalidate" ng-submit="onSubmit()">
				<div class="form-group">
					<input type="hidden" ng-model="login.ang_login_form" ng-init="login.ang_login_form='login'" required="required">
				</div>
				<div class="form-group" ng-class="{true:'has-success has-feedback', false:'has-error'}[status]">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" ng-model="login.ang_email" required="required">
					</div>
				</div>
				<div class="form-group" ng-class="{true:'has-success has-feedback', false:'has-error'}[status]">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" required="required" ng-model="login.ang_password" ng-minlength="6" ng-maxlength="18">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
			<pre>{{login | json}}</pre>
			<div ng-show="loading" class="alert" role="alert" style="text-align: center;" 
			ng-class="{true:' alert-success', false:'alert-danger'}[status]">
				<p>{{user_in_db}}</p>
			</div>
        </div>
        <div class="tab-pane fade" id="register" ng-controller="ng_register_controller">
        	<form class="form-horizontal form_style" enctype="multipart/form-data" novalidate="novalidate" ng-submit="onSubmit()">
        		<div class="form-group">
					<input type="hidden" ng-model="registration.ang_reg_form" ng-init="registration.ang_reg_form='registration'" required="required">
				</div>
				<div class="form-group" ng-class="{true:'has-success has-feedback', false:'has-error'}[status]">
					<label class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="required" ng-model="registration.ang_first_name"
						ng-pattern="/[xa-zA-Z]/" ng-pattern-err-type="invalid_name">
					</div>
				</div>
				<div class="form-group" ng-class="{true:'has-success', false:'has-error'}[status]">
					<label for="inputPassword" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="required" ng-model="registration.ang_last_name"
						ng-pattern="/[a-zA-Z]/" ng-pattern-err-type="invalid_name">
					</div>
				</div>
				<div class="form-group" ng-class="{true:'has-success', false:'has-error'}[status]">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" required="required" ng-model="registration.ang_email">
					</div>
				</div>
				<div class="form-group" ng-class="{true:'has-success', false:'has-error'}[status]">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" required="required" ng-model="registration.ang_password"
						ng-minlength="6" ng-maxlength="18">
					</div>
				</div>
				<div class="form-group" ng-class="{true:'has-success', false:'has-error'}[status]">
					<label for="inputPassword3" class="col-sm-2 control-label">Photo</label>
					<div class="col-sm-8">
						<input type="file" class="form-control" ng-model="registration.ang_photo">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<button type="submit" class="btn btn-default">Sign in</button>
					</div>
				</div>
			</form>
			<pre>{{registration | json}}</pre>
			<div ng-show="loading" class="alert" role="alert" style="text-align: center;" 
			ng-class="{true:' alert-success', false:'alert-danger'}[status]">
				<p>{{user_in_db}}</p>
			</div>
        </div>
    </div>
</div>
		
<?php
	include_once("assets/includes/footer.php");
?>	
