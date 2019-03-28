@extends('layouts.app')

@section('content')
<div class="container">
        <div class="alert alert-success" role="alert" align="center">
				<h3>Display All Books</h3>
			</div>
			<div class="row">
				<!--Card Layout Started-->
				<!--Tile for Book 1 started-->
				<div class="col-sm-6">
					<div class="card text-center">
						<div class="card-header">
							Book
						</div>
						<div class="card-body">
							<h5 class="card-title">Book Name</h5>
							<p class="card-text">Small Description about Book. (Author Name / Edition)</p>
							<a href="#" class="btn btn-primary">Read</a>
							<a href="#" class="btn btn-primary">Give Exam</a>
						</div>
						<div class="card-footer text-muted">
							2 days ago
						</div>
					</div>
				</div>
				<!--Tile For Book 1 Ended-->
				<!--Tile For Article 1 Started-->
				<div class="col-sm-6">
					<div class="card">
						<div class="card text-center">
							<div class="card-header">
								Article
							</div>
							<div class="card-body">
								<h5 class="card-title">Article Type</h5>
								<p class="card-text">Small Description About Article.(When/Where)</p>
								<a href="#" class="btn btn-primary">Read Full Article.</a>
							</div>
							<div class="card-footer text-muted">
								5 days ago
							</div>
						</div>
					</div>
				</div>
				<!--Tile For Article 1 Ended-->
				<!--Add further tiles of book/article between this comments from here-->
				<!--to here.-->
			</div>
			<!--Card Layout Over-->
		</div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
