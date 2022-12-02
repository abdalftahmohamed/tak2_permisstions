<form  enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/user')}}">

    {{  csrf_field()  }}
    <div class="form-group">
        <label for="upload_file" class="control-label col-sm-3">Upload File</label>
        <div class="col-sm-9">
            <input class="form-control" type="file" name="upload_file" id="upload_file">
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6-offset-2">
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
    </div>
</form>
