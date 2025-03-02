<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Response</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4F46E5;
            --background-color: #F3F4F6;
            --card-background: #FFFFFF;
            --text-primary: #111827;
            --text-secondary: #6B7280;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--background-color);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background: var(--card-background);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 3rem 2rem;
            text-align: center;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background-color: #DEF7EC;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
        }

        .icon-circle i {
            font-size: 40px;
            color: #059669;
        }

        h1 {
            color: var(--text-primary);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        p {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .home-button {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .home-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 640px) {
            .container {
                padding: 2rem 1.5rem;
            }

            h1 {
                font-size: 1.75rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon-circle">
            <i class="fas fa-check"></i>
        </div>
        <h1>Thank You, {{ $name }}!</h1>
        <p>Your response has been successfully recorded. We appreciate your time and feedback.</p>
        <a href="/dashboard" class="home-button">Return to Home</a>
    </div>
</body>
</html>
