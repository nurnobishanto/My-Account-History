<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account History - Add History</title>
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
            <h1>Add Account History</h1>
            <p>
                <a class="btn btn-info" href="{{ route('add') }}">Add History</a>
                <a class="btn btn-warning" href="{{ route('dashboard') }}">Dashboard</a>
            </p>
        </div>

    </div>

    <div class="container">
        <div class="row  justify-content-center">
            <form action="{{route('store.h')}}" method="post" class="row">
                @csrf
                <div class="mb-3 form-group col-md-6">
                    <label for="title" class="form-label">Title / Name *</label>
                    <input hidden type="text" name="user_id" required value="{{ auth()->id() }}">
                    <input type="text" class="form-control" id="title" name="title" required
                        placeholder="Enter Name / Title">
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="category" class="form-label">Select Category *</label>
                    <select name="category_id" id="category" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="type" class="form-label">Select Type *</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Incoming">Incoming</option>
                        <option value="Outgoing">Paid Expense</option>
                        <option value="Due">Deu Expense</option>
                    </select>
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="amount" class="form-label">Amount *</label>
                    <input type="number" class="form-control" id="amount" name="amount" required placeholder="Enter Amount">
                </div>

                <div class="mb-3 form-group col-md-6">
                    <label for="date" class="form-label">Date *</label>
                    <input type="date" name="date" class="form-control" id="date" required placeholder="Select Date" >
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="note" class="form-label">Note</label>
                    <textarea type="note" class="form-control" id="note" name="note" placeholder="Enter Note"></textarea>

                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>

</body>

</html>
