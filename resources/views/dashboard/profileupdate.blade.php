<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profileupdate.css') }}">
</head>
<body>

<div class="container">
    <h2>Update Your Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Service Type -->
        <div class="form-group">
            <label for="service-type">Service Type</label>
            <input type="text" id="service-type" class="form-control" placeholder="Enter your service type" name="service-type" value="{{ old('service-type') }}">
            <span class="text-danger">
                @error('service-type')
                {{ $message }}
                @enderror
            </span>
        </div>

        <!-- Profile Photo -->
        <div class="form-group">
            <label for="photo">Profile Photo</label>
            <input type="file" id="photo" class="form-control" name="photo">
            <span class="text-danger">
                @error('photo')
                {{ $message }}
                @enderror
            </span>
        </div>

        <!-- Submit Button -->
        <button type="submit">Update Profile</button>
    </form>
</div>

</body>
</html>
