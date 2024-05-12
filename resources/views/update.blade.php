<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .card-form {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card card-form">
            <div class="card-body">
                <h5 class="card-title text-center">Update</h5>
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email " value="{{$user->email}}">
                    </div>

                    <button type="submit" class="btn btn-primary up-btn">Submit</button>

                    @if (session('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {
        $('.up-btn').click(function(event) {
            event.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure you want to update?',
                text: "This action is permanent!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update Successfully'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Updating...', '', 'info');
                    setTimeout(() => {
                        form.submit();
                    }, 1000); 
                }
            });
        });
    });
</script>

</html>