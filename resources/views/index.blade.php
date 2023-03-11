<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-3  m-auto">
                    <h2 class="m-0">Send Mail</h2>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-3 m-auto border">
                    <form action="{{route('send')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>From:</label>
                            <input type="text" class="form-control" name="mail_from" placeholder="name@example.com"
                                   value="{{old('mail_from')}}">
                            @error('mail_from')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>To:</label>
                            <input type="text" class="form-control" name="mail_to" placeholder="name@example.com"
                                   value="{{old('mail_to')}}">
                            @error('mail_to')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Copy:</label>
                            <input type="text" class="form-control" name="mail_copy" placeholder="name@example.com"
                                   value="{{old('mail_copy')}}">
                            @error('mail_copy')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Subject:</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject of letter"
                                   value="{{old('subject')}}">
                            @error('subject')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Type:</label>
                            <select name="type" class="form-control">
                                <option value="text" {{'text' == old('type') ? ' selected' : ''}}>Text</option>
                                <option value="html" {{'html' == old('type') ? ' selected' : ''}}>HTML</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-group">Body: </label>
                            <textarea class="form-control" name="body" rows="3">{{old('body')}}</textarea>
                            @error('body')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="row mb-2 mt-2 col-3">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
</body>
</html>