<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>

<div class="jumbotron ">
    <div class="container text-center mt-5 mb-5">
        <h1>My Account History</h1>
        <p>
            <a class="btn btn-info" href="">Add History</a>
            <a class="btn btn-warning" href="">Dashboard</a>
        </p>
    </div>

</div>

<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-4">
            <div class="card bg-success text-light m-1">
                <div class="card-body text-center ">
                    <h2 class="card-title">{{$incoming}}</h2>
                    <h5 class="card-title">Incoming</h5>
                    <a href="#" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>


        @foreach($categories as $category)
            <div class="col-md-4 ">
                <div class="card bg-danger text-light m-1">
                    <div class="card-body text-center ">
                        <h2 class="card-title">{{count($category->myHistories)}}</h2>
                        <h5 class="card-title">{{$category}}</h5>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>

</body>
</html>
