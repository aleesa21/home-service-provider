<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/providerdash.css') }}">
</head>

<body>
    <div class="container">
        <div class="profile-card">
            <div class="profile-img">
                @if($provider->photo)
                <img src="{{ Storage::url($provider->photo) }}" alt="Profile Image">
                @else
                <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Image">
                @endif
            </div>
            <div class="profile-details">
                <h2>{{ $provider->name }}</h2>
                <p><span>Email: </span>{{ $provider->email }}</p>
                <p><span>Phone: </span>{{ $provider->phone }}</p>
                <p><span>Address: </span>{{ $provider->address }}</p>
                @if($provider->service_type)
                <div class="service-type">{{ $provider->service_type }}</div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
