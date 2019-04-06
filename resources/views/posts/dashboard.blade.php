@extends('layouts.app')
@section('content')
<div class="table-responsive">
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