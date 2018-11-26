<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Readers</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>
<div class="container">
<main >
        <div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title text-center" style="padding-bottom:10px;">شارك الاخرين كتبك المفضلة</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                            </div>
            <!-- /.box-tools -->
           
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                        <form action="/upload" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                               
                                <input type="text" name="title" id="title" placeholder="file name" class="form-control"/>
                            </div>
                            <label>chouse file</label>
                            <div class="form-group">
                                <input type="file" name="up_file"  class="form-control"/>
                            </div>
                            <div class="form-group">
                               <button type="submit" name="done" class="btn btn-danger btn-block">رفع الكتاب</button>
                            </div>
                        </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
        </div>
    </div>
</div>
        </main>
</div>
</body>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</html>

