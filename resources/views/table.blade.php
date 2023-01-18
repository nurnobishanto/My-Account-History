<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account History - {{ $category->title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="jumbotron ">
        <div class="container text-center mt-5 mb-5">
            <h1>{{ $category->title }} History</h1>
            <p>
                <a class="btn btn-info" href="{{ route('add') }}">Add History</a>
                <a class="btn btn-warning" href="{{ route('dashboard') }}">Dashboard</a>
            </p>
        </div>

    </div>

    <div class="container">
        <div class="row  justify-content-center">
            <h2>{{ $category->title }} Details</h2>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Note</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->myHistories as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->note}}</td>
                                <td>{{$item->date}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div>

</body>

</html>
