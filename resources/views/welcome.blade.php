<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account History - Dashboard</title>
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
            <h1>My Account History</h1>
            <p>
                <a class="btn btn-info" href="{{ route('add') }}">Add History</a>
                <a class="btn btn-warning" href="{{ route('dashboard') }}">Dashboard</a>
            </p>
        </div>

    </div>

    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card bg-success text-light m-1">
                        <div class="card-body text-center ">
                            <h2 class="card-title">{{ $incoming }}</h2>
                            <h5 class="card-title">Incoming</h5>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card bg-danger text-light m-1">
                        <div class="card-body text-center ">
                            <h2 class="card-title">{{ $outgoing }}</h2>
                            <h5 class="card-title">Outgoing</h5>

                        </div>
                    </div>
                </a>
            </div>
            @if ($incoming > $outgoing)
                <div class="col-md-4">
                    <a href="" class="text-decoration-none">
                        <div class="card bg-success text-light m-1">
                            <div class="card-body text-center ">
                                <h2 class="card-title">{{ $incoming - $outgoing }}</h2>
                                <h5 class="card-title">Balance</h5>

                            </div>
                        </div>
                    </a>
                </div>
            @else
                <div class="col-md-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card bg-danger text-light m-1">
                            <div class="card-body text-center ">
                                <h2 class="card-title">{{ $incoming - $outgoing }}</h2>
                                <h5 class="card-title">Balance</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endif



            @foreach ($categories as $category)
                @if($category->myHistories->where('type','Outgoing')->sum('amount')>0)
                    <div class="col-md-3">
                        <a href="{{route('outgoing.category',['slug'=>$category->slug])}}" class="text-decoration-none">
                            <div class="card bg-danger text-white mt-1">
                                <div class="card-body text-center ">
                                    <h2 class="card-title">{{ $category->myHistories->where('type','Outgoing')->sum('amount') }}</h2>
                                    <h5 class="card-title">{{ $category->title }} Paid Expense</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @if($category->myHistories->where('type','Incoming')->sum('amount')>0)
                        <div class="col-md-3">
                            <a href="{{route('incoming.category',['slug'=>$category->slug])}}" class="text-decoration-none">
                                <div class="card bg-success text-white mt-1">
                                    <div class="card-body text-center ">
                                        <h2 class="card-title">{{ $category->myHistories->where('type','Incoming')->sum('amount') }}</h2>
                                        <h5 class="card-title">{{ $category->title }} Incoming</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    @if($category->myHistories->where('type','Due')->sum('amount')>0)
                        <div class="col-md-3">
                            <a href="{{route('deu.category',['slug'=>$category->slug])}}" class="text-decoration-none">
                                <div class="card bg-warning text-dark mt-1">
                                    <div class="card-body text-center ">
                                        <h2 class="card-title">{{ $category->myHistories->where('type','Due')->sum('amount') }}</h2>
                                        <h5 class="card-title">{{ $category->title }} Due Expense</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if($category->myHistories->where('type','Due')->sum('amount')>0)
                        <div class="col-md-3">
                            <a href="{{route('upcoming.category',['slug'=>$category->slug])}}" class="text-decoration-none">
                                <div class="card bg-primary text-dark mt-1">
                                    <div class="card-body text-center ">
                                        <h2 class="card-title">{{ $category->myHistories->where('type','Upcoming')->sum('amount') }}</h2>
                                        <h5 class="card-title">{{ $category->title }} Upcoming</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
            @endforeach


        </div>
    </div>

</body>

</html>
