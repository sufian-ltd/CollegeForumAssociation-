<!DOCTYPE html>
<html>
<head>
    <title>Create New Post</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>

</head>
<body style="font-family: serif">
@include('admin-header')
<div class="container">
    <br>
    <div style="margin: 0 auto;width: 650px;">
        <h3 style="text-align: center;color: #0a8e63;border-bottom: 1px solid #ccdad6;padding-bottom: 10px;font-weight: bold;text-transform: uppercase;font-size: 17px;">Write Your Post</h3>
        <br/>
        <p style="color: #0a8e63;">Select or Add New Category</p>
        <form method="GET" action="{{ route('saveNewThread') }}" style="color: #0a8e63;">
            @csrf
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input list="category" required type="text" class="form-control" name="category" placeholder="Select or Add New Category"/>
            </div>

            <datalist id="category">
                @foreach($threads as $res)
                    <option value="{{ $res->category }}">
                @endforeach
            </datalist>

            <br>
            <p>Add Your Thread here</p>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <textarea style="resize: none;    max-width: 612px;max-height: 210px;min-height: 210px;min-width: 612px;" required type="text" class="form-control" name="details" placeholder="Your opinion"></textarea>
            </div>
            <br>
            <div class="input-group">
                <button style=" width: 120px;background-color: #197557;color: #fff;" type="submit" class="btn"><i class="glyphicon glyphicon-send"></i>  Share</button>
            </div>
        </form>
    </div>

</div>
</body>
</html>