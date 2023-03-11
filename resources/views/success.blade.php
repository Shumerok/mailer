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
                    <h2 class="m-0">Mail</h2>
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
                <div class="col-3 m-auto">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <tbody>
                                <tr>
                                    <td>From:</td>
                                    <td> {{$mail->mail_from}}</td>
                                </tr>
                                <tr>
                                    <td>To:</td>
                                    <td> {{$mail->mail_to}}</td>
                                </tr>
                                <tr>
                                    <td>Copy:</td>
                                    <td> {{$mail->mail_copy}}</td>
                                </tr>
                                <tr>
                                    <td>Type:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Body:</td>
                                    <td>
                                        <iframe srcdoc="<p>Some <i>html</i></p>"></iframe>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
</body>
</html>