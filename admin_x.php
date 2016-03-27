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
        <div class="tab-pane fade" id="login" ng-controller="ng_login_controller">
			<form class="form-horizontal form_style" name="login_form"  ng-submit="onSubmit(login_form.$valid)" novalidate="novalidate">
				<div class="form-group" ng-class="
				{
				'has-error':!login_form.email.$valid && (!login_form.$pristine || login_form.$submitted),
				'has-success':login_form.email.$valid && (!login_form.$pristine || login_form.$submitted)
				}">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" name="email" ng-model="login.ang_email" required="required">

						<p class="help-block" 
						ng-show="login_form.email.$error.required && 
						(!login_form.$pristine || login_form.$submitted)">
							This Field is required
						</p>
						<p class="help-block" 
						ng-show="login_form.email.$error.email && 
						(!login_form.$pristine || login_form.$submitted)">
							Please enter with @ symbol
						</p>

						<!-- <pre>Validation? {{login_form.email.$error | json}}</pre>
						<pre>Field Valid? {{login_form.email.$valid}}</pre>
						<pre>Form Prestine(not being touched by user)? {{login_form.$pristine}}</pre>
						<pre>Form Submitted? {{login_form.$submitted}}</pre> -->
					</div>
					
				</div>
				<div class="form-group" ng-class="{
				'has-error':login_form.password.$error.required && (!login_form.$pristine || login_form.$submitted),
				'has-success':!login_form.password.$error.required && (!login_form.$pristine || login_form.$submitted)
				}">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password" ng-model="login.ang_password" required="required">

						<p class="help-block" 
						ng-show="login_form.password.$error.required && 
						(!login_form.$pristine || login_form.$submitted)">
							This Field is required
						</p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<button type="submit" class="btn btn-default">Sign in</button>
					</div>
				</div>
			</form>
			<!-- this is called filter
				passing the variable(login) into a function(json), we can also create our own filter
			 -->
			<!-- <pre>{{login | json}}</pre> -->
			<pre>{{login_form | json}}</pre>
        </div>
        <div class="tab-pane fade" id="register" ng-controller="ng_register_controller">
        	<form class="form-horizontal form_style" name="registration_form" enctype="multipart/form-data" novalidate="novalidate" ng-submit="onSubmit(registration_form.$valid)">
				<div class="form-group" ng-class="{
				'has-error':(!isNaN(registration.ang_first_name) || registration_form.first_name.$error.required) && (!registration_form.$pristine || registration_form.$submitted),
				'has-success':(isNaN(registration.ang_first_name) || !registration_form.first_name.$error.required) && (!registration_form.$pristine || registration_form.$submitted),
				}">
					<label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="first_name" ng-model="registration.ang_first_name" required="required">
						<p class="help-block" 
						ng-show="registration_form.first_name.$error.required && 
						(!registration_form.$pristine || registration_form.$submitted)">
							This Field is required
						</p>
						<p class="help-block" 
						ng-show="!isNaN(registration.ang_first_name) && (!registration_form.$pristine || registration_form.$submitted)">
							Field invalid
						</p>
					</div>
				</div>
				<div class="form-group" ng-class="{
				'has-error':(!isNaN(registration.ang_last_name) || registration_form.last_name.$error.required) && (!registration_form.$pristine || registration_form.$submitted),
				'has-success':(isNaN(registration.ang_last_name) || !registration_form.last_name.$error.required) && (!registration_form.$pristine || registration_form.$submitted)
				}">
					<label for="inputPassword" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="last_name" ng-model="registration.ang_last_name"required="required">
						<p class="help-block" 
						ng-show="registration_form.last_name.$error.required && 
						(!registration_form.$pristine || registration_form.$submitted)">
							This Field is required
						</p>
						<p class="help-block" 
						ng-show="!isNaN(registration.ang_last_name) && (!registration_form.$pristine || registration_form.$submitted)">
							Field invalid
						</p>
					</div>
				</div>
				<div class="form-group" ng-class="
				{
				'has-error':!registration_form.email.$valid  && (!registration_form.$pristine || registration_form.$submitted),
				'has-success':registration_form.email.$valid && (!registration_form.$pristine || registration_form.$submitted)
				}">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" name="email" ng-model="registration.ang_email" required="required">
						<p class="help-block" 
						ng-show="registration_form.email.$error.required && 
						(!registration_form.$pristine || registration_form.$submitted)">
							This Field is required
						</p>
						<p class="help-block" 
						ng-show="registration_form.email.$error.email && 
						(!registration_form.$pristine || registration_form.$submitted)">
							Please enter with @ symbol
						</p>
					</div>
				</div>
				<div class="form-group"  ng-class="
				{
				'has-error':!registration_form.password.$valid  && (!registration_form.$pristine || registration_form.$submitted),
				'has-success':registration_form.password.$valid && (!registration_form.$pristine || registration_form.$submitted)
				}">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password" ng-model="registration.ang_password" required="required">
						<p class="help-block" 
						ng-show="registration_form.password.$error.required && 
						(!registration_form.$pristine || registration_form.$submitted)">
							This Field is required
						</p>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Photo</label>
					<div class="col-sm-8">
						<input type="file" name="photo" id="image"  class="form-control" size="20">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<button type="submit" class="btn btn-default">Sign in</button>
					</div>
				</div>
			</form>
			<pre>{{registration_form | json}}</pre>
        </div>
    </div>
</div>
		
<?php
	include_once("assets/includes/footer.php");
?>	
