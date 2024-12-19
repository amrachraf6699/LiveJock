<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Success</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Animation for the checkmark */
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
        .checkmark-container {
            width: 120px;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #2a9d8f;
            border-radius: 50%;
            animation: scaleIn 0.5s ease-out;
        }

        .checkmark {
            width: 60px;
            height: 60px;
            fill: white;
            animation: checkmarkAnimation 1s ease-out;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes checkmarkAnimation {
            0% {
                stroke-dasharray: 0, 100;
            }

            100% {
                stroke-dasharray: 100, 0;
            }
        }

        body {
            font-family: 'Cairo', sans-serif;
        }

    </style>
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="text-center">
        <!-- Animated Checkmark -->
        <div class="checkmark-container mx-auto mb-6">
            <!-- SVG Checkmark -->
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60" height="60">
                <path fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M20 6L9 17l-5-5"></path>
            </svg>
        </div>

        <!-- Success Message -->
        <h1 class="text-4xl font-semibold text-green-500 mb-4">Password Changed Successfully!</h1>
        <p class="text-lg text-gray-700 mb-6">Your password has been updated. Now, you can log in via our app using your new password.</p>
    </div>

</body>

</html>
