<script>
    var current_page = 1;
    var records_per_page = 1;


// console.log(s);

// changePage(current_page);
// console.log("yash");


function prevPage()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}
    
function changePage(page)
{
    console.log("yash");
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");
    var listing_table = document.getElementById("listingTable");
    var page_span = document.getElementById("page");
 
    // Validate page
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    listing_table.innerHTML = "";

    // for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < objJson.length; i++) {
    //     listing_table.innerHTML += objJson[i] + "<br>";
    // }
    for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < objJson.length; i++) {
        listing_table.innerHTML += objJson[i];
    }
    page_span.innerHTML = page + "/" + numPages();

    if (page == 1) {
        btn_prev.style.visibility = "hidden";
    } else {
        btn_prev.style.visibility = "visible";
    }

    if (page == numPages()) {
        btn_next.style.visibility = "hidden";
    } else {
        btn_next.style.visibility = "visible";
    }
}

function numPages()
{
    return Math.ceil(objJson.length / records_per_page);
}

window.onload = function() {
    changePage(10);
};
</script>
@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-dark" role="button">Go Back</a>
    <div><br></div>
    <div class="alert alert-primary" role="alert">
        <h1>Title</h1>
        <p class="h4">Description</p>
    </div>

    <hr>
    {{-- not parsing it as html (we want it because editor gives us html)
    <div>Body</div> --}}
    
    {{-- <div>Body</div> This syntax will parse the body --}}
    <div class="jumbotron">
        <p id="listingTable" width="100px"></p>
    
        <a href="javascript:prevPage()" id="btn_prev" class="btn btn-outline-info btn-sm">Prev</a>
        Page: <span id="page"></span>
        <a href="javascript:nextPage()" id="btn_next" class="btn btn-outline-info btn-sm">Next</a>
    </div>

    <hr>
    <div>
        <span style="font-size:20px;font-weight:500;padding-right:10px">Tags</span>
       
            <span class="badge badge-info" style="font-size:12px;vertical-align:middle">Tag</span>
         
    </div>

    <hr>
       
        <small>Written on date by poppy</small>
    
    
    <hr>
    <div class="jumbotron">
    <!-- Write Your code here poppy -->
    <div class="suggestions">
       <h1></h1>
    </div>
    <h2>Comments</h2>
        <div class="alert alert-light" style="padding-bottom:25px">
            <div>Commment</div>
            <div class="float-right">
                <small style="display: inline-block;color:rgb(90,80,70)">comment</small>
                <small>Comment</small>
            </div>
        </div>
    <div class="alert alert-secondary">No Comments</div>
    <div>
        <div class="form-group row">            
            <div class="col-sm-10" style="display: inline-block">
                <input type="text"></div>
            <button class="btn btn-primary"> Add Comment</button>
        </div>
    </div>
    {!!Form::close()!!}
    
</div>
    {{--{!!Form::open(['action'=>['CommentController@store',$post->id],'method'=>'POST'])!!}
    <div>
        <div class="form-group row">
            {{Form::label('comment','Comment',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10">
                {{Form::text('comment','',['class'=>'form-control','placeholder'=>'Add Comment'])}}
            </div>
        </div>
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}--}}
@endsection