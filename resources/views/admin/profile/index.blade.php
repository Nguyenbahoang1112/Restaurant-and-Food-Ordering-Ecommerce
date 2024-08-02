@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>My Profile</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Update User Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-form-label text-md-right col-2 col-md-2 col-lg-1">Avatar</label>
                                <div id="image-preview" class="image-preview"
                                    style="background-image: none; background-size: cover; background-position: center center;">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="avatar" id="image-upload">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email"
                                    value="{{ auth()->user()->email }}">
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Update password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.password.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Current password</label>
                                <input type="password" class="form-control" name="current_password">
                            </div>
                            <div class="form-group">
                                <label for="">New password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset(auth()->user()->avatar) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
