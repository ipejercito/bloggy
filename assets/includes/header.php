<!DOCTYPE html>
<html lang="en-US" ng-app="ng_admin">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<!-- <link rel="stylesheet" href="assets/js/angular/ladda/dist/ladda-themeless.min.css" /> -->
	<link rel="stylesheet" href="assets/style/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet/less" href="assets/style/style.less" />
</head>
<body>
	<div class="wrapper" ng-controller="wrapper">
	<div ng-show="loading" style="position:absolute; z-index:100; top:100px; left:579px;">
		<img style="width:200px" src="assets/uploads/scare.gif" alt="">
		<div class="alert alert-info" role="alert" style="text-align:center;">Loading....</div>
	</div>
		