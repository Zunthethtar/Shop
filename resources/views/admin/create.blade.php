@extends('admin.layouts.master')
@section ('content')

    <div class="main-content">
        <div class="page-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container-fluid">
                <form method="POST" action="{{ url('admin/store') }}">
                    @csrf
                    <label for="" class="form-label">Admin Name</label>
                    <input type="text" name="name" class="form-control w-auto" placeholder="Enter Admin Name...">
                    <label for="" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control w-auto" placeholder="Enter Email Name...">

                    <label for="" class="form-label">Password</label>
                   <!-- Assuming this is your password input field -->
                    <input type="password" name="password" class="form-control w-auto" id="password" placeholder="Password">
                <button class="mt-2" type="button" id="togglePassword" onclick="togglePasswordVisibility()">Show</button>

                    <div class="d-flex flex-row mt-2">
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                        <a href="{{ url('admin/index') }}" class="ms-2">
                            <button type="button" class="btn btn-sm btn-primary">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Add this script at the end of your Blade file -->
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var toggleButton = document.getElementById('togglePassword');

        // Toggle the type attribute of the password input between 'password' and 'text'
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.textContent = 'Hide';
        } else {
            passwordInput.type = 'password';
            toggleButton.textContent = 'show';
        }
    }
</script>

@endsection
