@extends('layouts.app')
@section('content')
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <!-- Numeric JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/numeric/1.2.6/numeric.min.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <!-- Numeric JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/numeric/1.2.6/numeric.min.js"></script>
<div class="table-responsive">
	<div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
    <!-- JAVASCRIPT CODE GOES HERE -->
  </script>
	<div id="myDiv2"><!-- Plotly chart will be drawn inside this DIV --></div>
	<script>var data = [{
  values: [34,26,40],
  labels: ['Completed', 'Pending', 'Test Given'],
  domain: {column: 0},
  name: 'Employee Analysis',
  hoverinfo: 'label+percent+name',
  hole: .6,
  type: 'pie'
}];

var layout = {
  title: 'Employee Analysis',
  grid: {rows: 1, columns: 2},
  showlegend: false
 
  
};

Plotly.newPlot('myDiv2', data, layout, {showSendToCloud:true});</script>
	 <div id="mydiv1" ><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
    var data = [{
  values: [19, 26, 55],
  labels: ['Pending', 'Completed', 'Test'],
  type: 'pie'
}];

Plotly.newPlot('mydiv1', data, {}, {showSendToCloud:true});
  </script>
	<div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
    var data = [
  {
    x: ['Oct18', 'Nov18', 'Dec18', 'Jan19', 'Feb19', 'March19'],
    y: [1, 3, 6,2,3,4,5,6,7],
    type: 'scatter'
  }
];

Plotly.newPlot('myDiv', data, {}, {showSendToCloud: true});
  </script>
				<table class="table">
					<thead>
						<tr>
						<th scope="col">Dashboard</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">
								<div class="card border-info mb-3" style="max-width: 18rem;">
									<div class="card-header">Employee</div>
									<div class="card-body text-info">
										<h5 class="card-title">Total Employee Registered</h5>
										<h1>5</h1>
										<!-- SELECT COUNT(name) FROM users; -->
									</div>
								</div>
							</th>
							<th scope="row">
								<div class="card border-info mb-3" style="max-width: 18rem;">
									<div class="card-header">Books</div>
									<div class="card-body text-info">
										<h5 class="card-title">No. of Books Uploaded</h5>
										<h1>7</h1>
										<!-- SELECT COUNT(type) FROM posts WHERE type=Book;  -->
									</div>
								</div>
							</th>
							<th scope="row">
								<div class="card border-info mb-3" style="max-width: 18rem;">
									<div class="card-header">Articles</div>
									<div class="card-body text-info">
										<h5 class="card-title">No. of Articles Uploaded</h5>
										<h1>7</h1>
										<!-- SELECT COUNT(type) FROM posts WHERE type=Article;  -->
									</div>
								</div>
							</th>
						</tr>
						<tr>
							<th scope="row">
								<div class="card border-info mb-3" style="max-width: 18rem;">
									<div class="card-header">Employee</div>
									<div class="card-body text-info">
										<h5 class="card-title">Total Books Opened Today</h5>
										<h1>5</h1>
									</div>
								</div>
							</th>
							<th scope="row">
								<div class="card border-info mb-3" style="max-width: 18rem;">
									<div class="card-header">Employee</div>
									<div class="card-body text-info">
										<h5 class="card-title">Total Pending Book</h5>
										<h1>7</h1>
										<!-- SELECT COUNT(status) FROM current_pages WHERE status=1;  -->
									</div>
								</div>
							</th>
							<th scope="row">
								<div class="card border-info mb-3" style="max-width: 18rem;">
									<div class="card-header">Articles</div>
									<div class="card-body text-info">
										<h5 class="card-title">Total Test Given</h5>
										<h1>7</h1>
										<!-- SELECT COUNT(status) FROM current_pages WHERE status=3;  -->
									</div>
								</div>
							</th>
						</tr>
						<tr>
							<th scope="row">
								<div class="card border-info mb-3" style="max-width: 18rem;">
									<div class="card-header">Employee</div>
									<div class="card-body text-info">
										<h5 class="card-title">Most Books/Article Read By</h5>
										<h1>User Name</h1>
										<!-- SELECT userid, COUNT(*) totalcount FROM current_pages WHERE `status`=2 GROUP BY userid HAVING COUNT(*)>1 ORDER BY COUNT(*) DESC LIMIT 1 -->
									</div>
								</div>
							</th>
							<th scope="row">
								<div class="card border-info mb-3" style="max-width: 18rem;">
									<div class="card-header">Articles</div>
									<div class="card-body text-info">
										<h5 class="card-title">Most Efficent Reader</h5>
										<h1>User Name</h1>
									</div>
								</div>
							</th>
						</tr>
					</tbody>
				</table>
			</div>
@endsection