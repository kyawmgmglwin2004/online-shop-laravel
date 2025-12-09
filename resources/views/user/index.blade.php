<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    
<div class="container py-5">
    @if(session('ban'))
        <div class="alert alert-info">
            {{session('ban')}}
        </div>
    @endif
     @if(session('unban'))
        <div class="alert alert-info">
            {{session('unban')}}
        </div>
    @endif
    <div class="card shadow-lg border-0">
        <a href="{{url('/home')}}" class="mb-2">Go Back Dashboard</a>
        <div class="card-header bg-gradient-primary text-white d-flex align-items-center justify-content-between" style="background: linear-gradient(90deg, #4e54c8, #8f94fb);">
            <h4 class="mb-0">Users List</h4>
            <i class="bi bi-people-fill" style="font-size: 1.5rem;"></i>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-secondary">#</th>
                            <th class="text-secondary">Name</th>
                            <th class="text-secondary">Email</th>
                            <th class="text-secondary">Role</th>
                            <th class="text-secondary">Created</th>
                            {{-- <th class="text-secondary">New / Old</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user as $user)
                            <tr class="border-bottom">
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="fw-bold text-primary">{{ $user->name }}</span></td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-{{ $user->role == 'admin' ? 'success' : 'secondary' }} text-capitalize">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                               
                                {{-- <td>
                                    @if($user->created_at->gt(now()->subDay()))
                                        <span class="badge bg-success">New</span>
                                    @endif
                                </td> --}}
                                <td>
                                    @if($user->suspended == 0)
                                     <td><a href="{{url("/users/suspend/$user->id")}}" class="btn btn-warning">Ban</a></td>
                                     
                                @else
                                    <td><a href="{{url("/users/unsuspend/$user->id")}}" class="btn btn-warning">Unban</a></td>
                                @endif

                                </td>
                            </tr>
                            
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>