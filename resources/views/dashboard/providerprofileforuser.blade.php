<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ $provider->name }} - Details</title>
@include('header.providerprofileofuserheader')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Profile</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: white;
            position: relative;
        }

        /* Background covering half the page */
        .half-background {
            position: absolute;
            width: 100%;
            height: 50%;
            top: 70px;
            left: 0;
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            z-index: -1;
        }

        /* Profile Card Layout */
        .profile-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 700px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            background: white;
            overflow: hidden;
        }

        /* Profile Image on the Right */
        .profile-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            background: lightgray;
            border-radius: 10px;
            margin-left: 20px;
        }

        /* Profile Info on the Left */
        .profile-info {
            flex: 1;
            text-align: left;
        }

        h2 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        p {
            color: #777;
            font-size: 15px;
            margin: 5px 0;
        }

        .service-tag {
            background: #007bff;
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 14px;
            display: inline-block;
            margin: 5px;
        }

        /* Buttons Container */
        .feedback-container {
            margin-top: 15px;
            display: flex;
            gap: 10px; /* Adds space between buttons */
        }

        .feedback-btn {
            background: #ff416c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .feedback-btn:hover {
            background: #ff2b4b;
        }

        .reviews-btn {
            background: #ff416c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .reviews-btn:hover {
            background:#ff2b4b;
        }

    </style>
</head>
<body>
    

    <div class="half-background"></div>

    <!-- Profile Card -->
    <div class="profile-card">
        <!-- Profile Info (Left Side) -->
        <div class="profile-info">
            <h2>{{ $provider->name }}</h2>
            <p><strong>Address:</strong> {{ $provider->address }}</p>
            <p><strong>Email:</strong> {{ $provider->email }}</p>
            <p><strong>Phone:</strong> {{ $provider->phone }}</p>

            <p><strong>Service Types:</strong></p>
            @foreach(json_decode($provider->service_type, true) as $service)
            <span class="service-tag">{{ $service }}</span>
            @endforeach

            <!-- Buttons -->
            <div class="feedback-container">
                <button class="feedback-btn">Add Feedback</button>
                <button class="reviews-btn">See Reviews</button>
            </div>
        </div>

        <!-- Profile Image (Right Side) -->
        <img src="{{ Storage::url($provider->photo) }}" alt="{{ $provider->name }}" class="profile-img">
    </div>

</body>
</html>
