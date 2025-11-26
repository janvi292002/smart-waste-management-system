<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Waste Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            background-image: url('{{ asset("image/waste.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
            overflow: hidden;
        }

        /* Dark Overlay with Fade Animation */
        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.55);
            top: 0;
            left: 0;
            animation: fadeIn 2s ease-in-out forwards;
        }

        /* Page Title Animation */
        .top-title {
            position: absolute;
            top: 100px;
            width: 100%;
            text-align: center;
            z-index: 10;
            font-size: 42px;
            font-weight: bold;
            text-shadow: 0 0 12px black;
            opacity: 0;
            animation: slideDown 1.2s ease-out forwards;
        }

        /* Button Section Animation */
        .center-buttons {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            text-align: center;
            opacity: 0;
            animation: slideUp 1.5s ease-out forwards;
            animation-delay: 0.6s;
        }

        /* Glowing Buttons */
        .btn-custom {
            display: inline-block;
            padding: 15px 35px;
            margin: 10px;
            font-size: 20px;
            color: white;
            border-radius: 35px;
            text-decoration: none;
            transition: 0.4s;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(4px);
            border: 2px solid rgba(255,255,255,0.4);
            box-shadow: 0 0 0px rgba(255,255,255,0.2);
        }

        .btn-custom:hover {
            background: rgba(255,255,255,0.35);
            border-color: white;
            box-shadow: 0 0 20px white;
            transform: scale(1.1);
        }

        .btn-register { border-color: #28a745; }
        .btn-register:hover { background: #28a745; }

        .btn-login { border-color: #007bff; }
        .btn-login:hover { background: #007bff; }

        /* --- Animations --- */

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translate(-50%, -40%); }
            to { opacity: 1; transform: translate(-50%, -50%); }
        }

    </style>
</head>

<body>

    <div class="overlay"></div>

    <!-- Title -->
    <h1 class="top-title"><i><b>Smart Waste Management System</b></i></h1>

    <!-- Buttons -->
    <div class="center-buttons">
        <a href="/register" class="btn-custom btn-register">Register</a>
        <a href="/login" class="btn-custom btn-login">Login</a>
    </div>

</body>
</html>
