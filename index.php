<!DOCTYPE html>
<html>
<head>
	<title>Documentation</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="master/css/bootstrap.min.css">
	<script type="text/javascript" src="master/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="master/js/popper.min.js"></script>
	<script type="text/javascript" src="master/js/jquery-3.4.1.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		code{
			background-color: #F3F3F3;
			/*color: #000000;*/
			font-weight: bold;
			padding: 3px;
			letter-spacing: 0.8px;
		}

		@font-face { 
			font-family: questrial; 
			src: url('master/font/Questrial-Regular.ttf'); 
		}

		.font-questrial{
			font-family: questrial;
		} 

		.nav-link{
			text-decoration: none;
			outline: none;
			cursor: pointer;
		}

	</style>  
</head>
<body>
	<!-- <h4 class="d-block font-questrial p-2 fixed-top text-light">DBCRUD</h4> -->
<nav><!--  flex-column flex-sm-row  -->
	<ul class="nav nav-tabs main-nav justify-content-end bg-dark">
		<li class="nav-item mr-auto nav-brand d-none">
		<a class="nav-link font-questrial text-light font-weight-bold" style="font-size: 15px;">DBCRUD</a>
		</li>
	  <li class="nav-item">
	    <a class="nav-link home main-nav-item text-dark active" href="#">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link installation main-nav-item text-light " href="#">Installation</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link syntax main-nav-item text-light" href="#">Syntax Table</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link examples main-nav-item text-light" href="#">Examples</a>
	  </li>
	  <!-- <li class="nav-item">
	    <a class="nav-link about main-nav-item text-light" href="#">About</a>
	  </li>
 -->
	  <li class="nav-item d-none lang text-white">
	  	<div class="nav-link">
	  	<img src="master/image/mm.svg"	width="20px" class="lang-flag">
	  	<span class="lang-txt">MM</span>
	  </div>
	  </li>

	  <!--  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li> -->
	</ul>
</nav>

<div class="show-area vh-100 col-md-12">


<!-- HOME -->
<div class="home-view container text-center view" id="home" style="margin-top: 20vh;">
	<h1 class="font-questrial">DBCRUD LIBRARY</h1>
	<p class="text-muted font-questrial">Bring to you by Ch405</p>

	<div class="mt-5 justify-content-center row">
		<a href="https://www.facebook.com/Ch405.yhh" target="_blank" style="outline: none;"><img src="master/image/fb.svg" width="50px" class="mx-3 shadow-lg rounded-circle"></a>
		<a href="https://github.com/yhhCh405/dbcrud/" target="_blank" style="outline: none;"><img src="master/image/git.svg" width="50px" class="mx-3 shadow rounded-circle"></a>
	</div>
</div>

<!-- Installation -->
<div class="installation-view container d-none view my-5" id="install">
<h3>Installation</h3>
<li><p>Edit config.php and replace with your database information</p></li>
<pre><code>
	&lt;?php
		class globalVariables{
			protected $db_server		= "<span class="border border-info rounded">127.0.0.1</span>";
			protected $db_username	= "<span class="border border-info rounded">root</span>";
			protected $db_password	= "<span class="border border-info rounded">password</span>";
			protected $db_name 		= "<span class="border border-info rounded">test_db</span>";
		}
	?&gt;
</code></pre>

<li><p>Include this library at the top of your php file. e.g: <code>include('path/to/yhh-dbcrud.php');</code></p></li>
</div>


<!-- syntax table -->
<div class="syntax-view container mt-5 d-none view" id="syntax">
<h2 class="my-2 text-primary">Traditional Methods</h2>
<table class="table table-responsive table-striped table-bordered">
	<thead class="bg-secondary text-white">
		<tr>
			<th>No</th>
			<th width="160px">Method</th>
			<th width="300px">Syntax</th>
			<th>Description</th>
			<th>Remark</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td><code>dbConnect()</code></td>
			<td><code>$dbop->dbConnect()</code></td>
			<td>This can call when you make changes in config.php. Usually you don't need this to call, since this method already invoked in constructor.</td>
			<td><code>$dbop</code> is refer to DatabaseOperation class. i.e: <code>$dbop = new DatabaseOperation</code></td>
		</tr>
		<tr>
			<td>2</td>
			<td><code>select()</code></td>
			<td><code>$dbop->select($table,$where_names,$where_values,$count,$target)</code></td>
			<td>This method select single column and return single column value or false.</td>
			<td>$count is refer to column counts of current query. Remember to check whether column name counts and value counts are the same.</td>
		</tr>
		<tr>
			<td>3</td>
			<td><code>selectId()</code></td>
			<td><code>$dbop->selectId($tableName,$columnNames,$values,$count)</code></td>
			<td>Select id from database and return id or false</td>
			<td></td>
		</tr>
		<tr>
			<td>4</td>
			<td><code>insert()</code></td>
			<td><code>$dbop->insert($table,$names,$values,$count)</code></td>
			<td>Insert values from <code>$names</code> and <code>$values</code> to database. Return <b>true</b> or <b>false</b></td>
			<td></td>
		</tr>
		<tr>
			<td>5</td>
			<td><code>update()</code></td>
			<td><code>$dbop->update($table,$names,$values,$count,$where_name,$where_val,$where_count)</code></td>
			<td>Update data that have already existed in the database. Return <b>true</b> or <b>false</b></td>
			<td></td>
		</tr>
		<tr>
			<td>6</td>
			<td><code>delete()</code></td>
			<td><code>$dbop->delete($table,$where_names,$where_values,$count)</code></td>
			<td>Delete data from database which return <b>true</b> or <b>false</b></td>
			<td></td>
		</tr>
		<tr>
			<td>7</td>
			<td><code>isDataExist()</code></td>
			<td><code>$dbop->isDataExist($table,$where_names,$where_values,$count)</code></td>
			<td>Check if data exist in the database and return <b>true</b> or <b>false</b></td>
			<td></td>
		</tr>
	</tbody>
</table>

<hr class="my-5">

<h2 class="my-2 text-primary">Ready Methods</h2>
<p>If you ever think you are writing repeating names like table names, column names etc, then this methods will be suitable to you. Ready methods must be used together with setters,getters because it works through static variables.</p>
<h3 class="text-primary">Setters</h3>
<table class="table table-responsive table-striped table-bordered">
	<thead class="bg-secondary text-white">
		<tr>
			<th>No</th>
			<th width="200px">Method</th>
			<th width="300px">Syntax</th>
			<th>Description</th>
			<th>Remark</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td><code>setTableName()</code></td>
			<td><code>$dbop->setTableName($tableName)</code></td>
			<td>To set table name</td>
			<td></td>
		</tr>
		<tr>
			<td>2</td>
			<td><code>setColNames()</code></td>
			<td><code>$dbop->setColNames($col_names)</code></td>
			<td>To set column names that will be written before 'WHERE'</td>
		</tr>
		<tr>
			<td>3</td>
			<td><code>setValues()</code></td>
			<td><code>$dbop->setValues($col_values)</code></td>
			<td>To set column values that will be written before 'WHERE'</td>
			<td></td>
		</tr>
		<tr>
			<td>4</td>
			<td><code>setCount()</code></td>
			<td><code>$dbop->setCount($count)</code></td>
			<td>Enter a number that must be count of columns which you previously set through <code>setColNames()</code> or <code>setValues()</code></td>
			<td></td>
		</tr>
		<tr>
			<td>5</td>
			<td><code>setWhereNames()</code></td>
			<td><code>$dbop->setWhereNames($wName)</code></td>
			<td>To set column names that will be written after 'WHERE' for condition check</td>
			<td></td>
		</tr>
		<tr>
			<td>6</td>
			<td><code>setWhereValues()</code></td>
			<td><code>$dbop->setWhereValues($wValue)</code></td>
			<td>To set column values that will be written after 'WHERE' for condition check</td>
			<td></td>
		</tr>
		<tr>
			<td>7</td>
			<td><code>setWhereCount()</code></td>
			<td><code>$dbop->setWhereCount($wCount)</code></td>
			<td>Enter a number that must be count of columns which you previously set through <code>setWhereNames()</code> or <code>setWhereValues()</code></td>
			<td></td>
		</tr>
	</tbody>
</table>

<hr class="my-5">

<h3 class="text-primary">Getters</h3>
<table class="table table-responsive table-striped table-bordered">
	<thead class="bg-secondary text-white">
		<tr>
			<th>No</th>
			<th width="200px">Method</th>
			<th width="300px">Syntax</th>
			<th>Description</th>
			<th>Remark</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td><code>getTableName()</code></td>
			<td><code>$dbop->getTableName($tableName)</code></td>
			<td>Return table name which you previously set</td>
			<td></td>
		</tr>
		<tr>
			<td>2</td>
			<td><code>getColNames()</code></td>
			<td><code>$dbop->getColNames($col_names)</code></td>
			<td>Return column names that will be written before 'WHERE' which you previously set</td>
		</tr>
		<tr>
			<td>3</td>
			<td><code>getValues()</code></td>
			<td><code>$dbop->getValues($col_values)</code></td>
			<td>Return column values that will be written before 'WHERE' which you previously set</td>
			<td></td>
		</tr>
		<tr>
			<td>4</td>
			<td><code>getCount()</code></td>
			<td><code>$dbop->getCount($count)</code></td>
			<td>Return a number that must be count of columns which you previously set</td>
			<td></td>
		</tr>
		<tr>
			<td>5</td>
			<td><code>getWhereNames()</code></td>
			<td><code>$dbop->getWhereNames($wName)</code></td>
			<td>Return column names that will be written after 'WHERE' which you previously set</td>
			<td></td>
		</tr>
		<tr>
			<td>6</td>
			<td><code>getWhereValues()</code></td>
			<td><code>$dbop->getWhereValues($wValue)</code></td>
			<td>Return column values that will be written after 'WHERE' which you previously set</td>
			<td></td>
		</tr>
		<tr>
			<td>7</td>
			<td><code>getWhereCount()</code></td>
			<td><code>$dbop->getWhereCount($wCount)</code></td>
			<td>Return a number that must be count of columns that will be written after 'WHERE' which you previously set</td>
			<td></td>
		</tr>
	</tbody>
</table>


<hr class="my-5">

<h3 class="text-primary">Ready Methods</h3>

<table class="table table-responsive table-striped table-bordered">
	<thead class="bg-secondary text-white">
		<tr>
			<th>No</th>
			<th width="200px">Method</th>
			<th width="300px">Syntax</th>
			<th width="50%">Description</th>
			<th>Remark</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td><code>insertReady()</code></td>
			<td><code>$dbop->insertReady()</code></td>
			<td>Insert data which you previously set through setters</td>
			<td></td>
		</tr>
		<tr>
			<td>2</td>
			<td><code>updateReady()</code></td>
			<td><code>$dbop->updateReady()</code></td>
			<td>Update data which you previously set through setters</td>
			<td></td>
		</tr>
		<tr>
			<td>3</td>
			<td><code>deleteReady()</code></td>
			<td><code>$dbop->deleteReady()</code></td>
			<td>Delete data which you previously set through setters</td>
			<td></td>
		</tr>
	</tbody>
</table>


<hr class="my-5">

<h3 class="text-primary">This Methods</h3>

<table class="table table-responsive table-striped table-bordered">
	<thead class="bg-secondary text-white">
		<tr>
			<th>No</th>
			<th width="200px">Method</th>
			<th width="300px">Syntax</th>
			<th>Description</th>
			<th>Remark</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td><code>selectThis()</code></td>
			<td><code>$dbop->selectThis($target)</code></td>
			<td>Select $target using data which you previously set through setters</td>
			<td></td>
		</tr>
		<tr>
			<td>2</td>
			<td><code>deleteThis()</code></td>
			<td><code>$dbop->deleteThis($whereNames,$whereValues,$where_count)</code></td>
			<td>Delete data using given parameters and table name which you previously set through setters</td>
			<td></td>
		</tr>
	</tbody>
</table>


</div>

<!-- examples -->
<div class="examples container view mt-5 d-none">
<h3>Traditional Methods</h3>
<p>Here is the example of using <code>update()</code> method.</p>
<p>Let you have table name <i>test</i> with column names <i>id,username,password</i>. In this table there be a row with values <i>1,mgmg,password000</i>. If so, we can update the values with this way-</p>
<p><code>
	update('test','username|password','david|P4sSw0rd000',2,'id','1',1);
</code></p>
<p>This query is equal to</p>
<p><code>
	UPDATE test SET username='david',password='P4sSw0rd000' WHERE id='1';
</code></p>
<br>
<p class="alert alert-success"><span class="text-danger"><b>NOTE:</b></span> Use |(pipe sign) as split point of names and values following by the parameter which is the count of names and values. In the above method, there are two column names (username and password) so count have been set to 2 and count 1 for id.</p>

<h3>Ready and This Methods</h3>
<p>Do you ever face a problem that the same parameter values have to be written again and again? If so, these methods will help you. These aim to be <b>less code do more</b></p>
<p>This methods must be use together with <i>setters</i>. For example-</p>
<p>
<code><pre class="p-4" style="background: #F3F3F3;">
setTableName('test'); <span class="text-muted">//Do not need to set this again until you want to change to the another table</span>
setColNames('username|password');
setValues('david|P4sSw0rd000');
setCount('2');
setWhereNames('id');
setWhereValues('1');
setWhereCount('1');
updateReady();

<span class="text-muted">//other codes...</span>
<span class="text-muted">...</span>	

setValues('david|ch4ng3d');
updateReady(); <span class="text-muted">//UPDATE test SET username='david',password='ch4ng3d' WHERE id='1';</span>

<span class="text-muted">//other codes..</span>
<span class="text-muted">...</span>

setValues('aungaung|pa55w0rD000');
setWhereValues('2'); 
updateReady(); <span class="text-muted">//UPDATE test SET username='aungaung',password='pa55w0rD000' WHERE id='2';</span>
</pre>
</code></p>

<p>As the same above <b>'This'</b> methods need setters but also it needs parameters. For Example-</p>
<code>selectThis('username');</code>
<div class="mb-5"></div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('code').addClass('text-danger rounded');
	});

	$(".main-nav-item").click(function(){
		$(".main-nav-item").addClass('text-light');
		$(".main-nav-item").removeClass('active');
		$(".main-nav-item").removeClass('text-dark');

		$(this).addClass('active');
		$(this).addClass('text-dark');

		if ($(this).hasClass('home')) {
			$('.view').addClass('d-none');
			$('.nav-brand').addClass('d-none');
			$('.home-view').removeClass('d-none');
		}else if ($(this).hasClass('installation')) {
			$('.view').addClass('d-none');
			$('.nav-brand').removeClass('d-none');
			$('.installation-view').removeClass('d-none');
		}else if ($(this).hasClass('syntax')) {
			$('.view').addClass('d-none');
			$('.nav-brand').removeClass('d-none');
			$('.syntax-view').removeClass('d-none');
		}else if ($(this).hasClass('examples')) {
			$('.view').addClass('d-none');
			$('.nav-brand').removeClass('d-none');
			$('.examples').removeClass('d-none');
		}
	});

	$('.lang').click(function(){
		if ($('.lang-txt').text()=="MM") {
			$('.lang-flag').attr('src','master/image/uk.svg');	
			$('.lang-txt').text('EN');
		}else if ($('.lang-txt').text()=="EN") {
			$('.lang-flag').attr('src','master/image/mm.svg');
			$('.lang-txt').text('MM');
		}
	});
</script>
</body>
</html>