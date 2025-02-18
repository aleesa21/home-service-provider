<!-- resources/views/provider/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .profile-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .profile-card .profile-img {
            flex: 1 1 250px;
            max-width: 250px;
            margin-right: 20px;
            text-align: center;
        }

        .profile-card .profile-img img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-card .profile-details {
            flex: 2 1 500px;
            max-width: 500px;
            text-align: left;
        }

        .profile-card h2 {
            color: #3c4858;
            font-size: 32px;
            margin-bottom: 15px;
        }

        .profile-card p {
            color: #555;
            font-size: 16px;
            margin: 8px 0;
        }

        .profile-card .service-type {
            background-color: #6c757d;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 10px;
        }

        .profile-card .contact-info {
            margin-top: 20px;
        }

        .profile-card .contact-info span {
            font-weight: bold;
            color: #333;
        }

        .profile-card button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-card button:hover {
            background-color: #0056b3;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .profile-card {
                flex-direction: column;
                align-items: center;
            }

            .profile-card .profile-img {
                margin-bottom: 20px;
            }

            .profile-card .profile-details {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-card">
        <div class="profile-img">
            <img src="{{ asset('images/profiles/p1.jpg') }}" alt="Profile Image">
        </div>
        <div class="profile-details">
            <h2>{{ $provider->name }}</h2>
            <p><span>Email: </span>{{ $provider->email }}</p>
            <p><span>Phone: </span>{{ $provider->phone }}</p>
            <p><span>Address: </span>{{ $provider->address }}</p>
            

            
        </div>
    </div>
</div>

</body>
</html>
