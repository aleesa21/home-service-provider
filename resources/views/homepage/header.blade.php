<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Calibri, sans-serif;
        }

        body {
            padding-top: 60px;
        }

        * {
            text-decoration: none;
            box-sizing: border-box;
        }


        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: #32353c;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo a {
            font-size: 25px;
            font-weight: 600;
            color: #ffffff;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-links a {
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
        }


        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            padding: 6px 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .search-bar button {
            background-color: #1588fc;
            color: white;
            border: none;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <a href="/">Home Service Provider</a>
        </div>

        <div class="nav-links">
            
            <a href="/about-us">About Us</a>
            <a href="/contact-us">Contact Us</a>

            <form class="search-bar" action="/search" method="GET">
                <input type="text" name="query" placeholder="Search services..." required>
                <button type="submit">Search</button>
            </form>

            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
    </nav>

</body>

</html>