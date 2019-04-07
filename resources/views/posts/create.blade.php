@extends('layouts.app')

@section('content')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <h1>Create</h1>
    {!!Form::open(['action'=>'PostsController@store','method'=>'POST'])!!}
        <div class="form-group row">
            {{Form::label('title','Title',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10">
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('summarty','Summary',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10">
                {{Form::text('description','',['class'=>'form-control','placeholder'=>'Summary'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('author','Author',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10">
                {{Form::text('author','',['class'=>'form-control','placeholder'=>'Author'])}}
            </div>
        </div>

        <div class="form-group row">
            {{Form::label('tags','Tags',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10">
                <?php echo Form::checkbox('tag0', '0');?> Technology
                &emsp;&emsp;
                <?php echo Form::checkbox('tag1', '1');?> Business
                &emsp;&emsp;
                <?php echo Form::checkbox('tag2', '2');?> Company
                &emsp;&emsp;
                <?php echo Form::checkbox('tag3', '3');?> Innovation
                &emsp;&emsp;
            </div>
        </div>

        <div class="form-group row">
            {{Form::label('type','Type',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10">
                <?php echo Form::radio('type', '1')?> Book
                &emsp;&emsp;
                <?php echo Form::radio('type', '0')?> Article
            </div>
        </div>
        <input type="radio" name="inputtype" value="filetype">Hey
        <input type="radio" name="inputtype" value="texttype">Hey1
        <input type="file" name='myFile' id='fileupload' style="visibility: hidden;">
        <script type="text/javascript">
                var typeoffile=document.getElementByName('inputtype');
                var fileupload=document.getElementById('fileupload');
                typeoffile = typeoffile.value;
                if(typeoffile==='filetype')
                {
                    document.getElementById("fileupload").style.visibility = "visible";
                    fileupload.type='file';
                }
                
        </script>

        <div class="form-group row">
            
            {{Form::label('body','Body',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10">
                <textarea id="summernote" name="body"></textarea>
               
                <!-- {{-- <TODO:> Ck editor not working</TODO:> --}}
                {{-- {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}} --}}
                {{-- {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Body'])}} --}}
                {{-- <textarea name="editor1"></textarea> --}} -->
            </div>
        </div>

        <div class="form-group row">
            {{Form::label('type','Langauge',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10">
                <?php echo Form::radio('langauge', 'English')?> English
                &emsp;&emsp;
                <?php echo Form::radio('langauge', 'Hindi')?> Hindi
                &emsp;&emsp;
                <?php echo Form::radio('langauge', 'Gujarati')?> Gujarati
            </div>
        </div>

        <div class="form-group row">
            {{Form::label('evaluation questions','Evaluation Questions',['class'=>'col-sm-2 col-form-label'])}}
            <div class="col-sm-10 form-control'">
                <?php echo Form::radio('evaluation', '1')?> Yes
                &emsp;&emsp;
                <?php echo Form::radio('evaluation', '0')?> No
            </div>
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}

<script>
    $(document).ready(function() {
        // $('#summernote').summernote({
//   toolbar: [
//     // [groupName, [list of button]]
//     ['style', ['bold', 'italic', 'underline', 'clear']],
//     ['font', ['strikethrough', 'superscript', 'subscript']],
//     ['fontsize', ['fontsize']],
//     ['color', ['color']],
//     ['para', ['ul', 'ol', 'paragraph']],
//     ['height', ['height']]
//   ]
// });
        $('#summernote').summernote();
    });
  </script>
       <!--  <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                console.log( editor );
                } )
                .catch( error => {
                console.error( error );
            } );
        </script> -->
<!-- <script>
                        CKEDITOR.replace( 'editor1' );
                </script> -->

@endsection