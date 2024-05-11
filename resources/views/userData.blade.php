<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>
<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
    @endif
    @if (session('delete'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('delete') }}
            </div>
    @endif

    <a href="register" class = "btn btn-primary">register</a>

    <table class = "table table-bordered">
        <thead class = "table-sm">
            <br>
            <br>
            <tr>
                <th scope="col" class="col-2">ID</th>
                <th scope="col" class="col-4">NAME</th>
                <th scope="col" class="col-4">EMAIL</th>
                <th scope="col" class="col-1">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action=" {{route('user.delete',$user->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger bt"> Delete</button>
                        </form>
                        <form action=" {{route('user.delete',$user->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-warning bt"> Edit</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</body>
<script>
    $(document).ready(function() {
        $('.bt').click(function(event) {
            event.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "It will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
</html>
