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
            padding-top: 70px; /* So content doesn't go under fixed navbar */
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
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo a {
            font-size: 25px;
            font-weight: 600;
            color: #ffffff;
            text-transform: uppercase;
        }

        .navbar .logo a:hover {
            color: #ff8c00;
        }

        .search-bar {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .search-bar input {
            padding: 6px 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;
            width: 200px;
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

        .suggestions-box {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border: 1px solid #ccc;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .suggestions-box div {
            padding: 10px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .suggestions-box div:hover {
            background: #f0f0f0;
        }

        .right-section {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #fff;
        }

        .right-section span {
            font-size: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .logout-button {
            background-color: red;
            color: white;
            font-size: 14px;
            font-weight: bold;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: darkred;
        }

        .logout-button:focus {
            outline: none;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .search-bar {
                margin-left: 0;
                width: 100%;
            }

            .right-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <a href="/userdash">Home Service Provider</a>
        </div>

        <form class="search-bar" action="{{ route('search') }}" method="GET">
            <input type="text" id="search-input" name="query" placeholder="Search services..." autocomplete="off">
            <button type="submit">Search</button>
            <div id="suggestions" class="suggestions-box"></div>
        </form>

        <div class="right-section">
            <span>👤{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var searchRoute = "{{ route('search.suggestions') }}";
        let debounceTimer;

        $(document).ready(function() {
    $('#search-input').on('input', function() {
        clearTimeout(debounceTimer);
        let query = $(this).val().trim();

        if (query.length > 1) {
            debounceTimer = setTimeout(() => {
                $.ajax({
                    url: searchRoute, 
                    type: "GET",
                    data: { query: query },
                    success: function(data) {
                        let suggestions = $('#suggestions');
                        suggestions.empty().fadeIn();

                        if (Array.isArray(data) && data.length > 0) {
                            // If an exact match exists, show only that
                            if (data.includes(query)) {
                                suggestions.append(`<div class="suggestion-item">${query}</div>`);
                            } else {
                                data.forEach(service => {
                                    suggestions.append(`<div class="suggestion-item">${service}</div>`);
                                });
                            }
                        } else {
                            suggestions.append('<div class="no-results">No results found</div>');
                        }
                    },
                    error: function() {
                        $('#suggestions').empty().append('<div class="no-results">Error fetching data</div>').fadeIn();
                    }
                });
            }, 300);
        } else {
            $('#suggestions').fadeOut();
        }
    });

    // Handle click on suggestion
    $(document).on('click', '.suggestion-item', function() {
        $('#search-input').val($(this).text());
        $('#suggestions').fadeOut();
    });

    // Hide suggestions when clicking outside
    $(document).click(function(e) {
        if (!$('#search-input').is(e.target) && !$('#suggestions').is(e.target) && $('#suggestions').has(e.target).length === 0) {
            $('#suggestions').fadeOut();
        }
    });
});


    </script>
</body>

</html>
