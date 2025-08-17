<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Email Verification</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Inter:wght@300;500&display=swap"
        rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', Arial, sans-serif;
            background: #f9f4f4;
            color: #444;
        }

        .email-wrapper {
            max-width: 620px;
            margin: 40px auto;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #c9184a, #a11237);
            padding: 40px 20px 30px 20px;
            text-align: left;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            padding-left: 24px;
            /* pushes ~3 spaces right */
            color: #ffffff;
            /* White text now */
        }

        /* Content */
        .content {
            padding: 50px 30px 40px 30px;
            text-align: center;
        }

        .content h2 {
            font-size: 24px;
            font-weight: 600;
            margin: 35px 0 18px 0;
            /* extra breathing space above */
            color: #c9184a;
            font-family: 'Poppins', sans-serif;
        }

        .content p {
            font-size: 15px;
            line-height: 1.7;
            margin: 12px 0;
            color: #555;
        }

        /* Button */
        .btn {
            display: inline-block;
            margin: 25px 0;
            padding: 14px 34px;
            background: linear-gradient(135deg, #c9184a, #a11237);
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 4px 15px rgba(201, 24, 74, 0.4);
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(135deg, #a11237, #800f2f);
            box-shadow: 0 6px 20px rgba(201, 24, 74, 0.6);
        }

        .link {
            font-size: 13px;
            word-break: break-all;
            color: #c9184a;
            margin-top: 12px;
            display: inline-block;
        }

        /* Footer */
        .footer {
            background: #fafafa;
            text-align: center;
            font-size: 13px;
            color: #888;
            padding: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <!-- Header -->
        <div class="header">
            <h1>Orbeva</h1>
        </div>

        <!-- Body -->
        <div class="content">
            <h2>Verify Your Email</h2>
            <p>Hey {{ $user->name }},</p>
            <p>Welcome to Orbeva 🥂 We're thrilled to have you!
                Please confirm your email address to activate your account and unlock all features.</p>
            <a href="{{ $url }}" class="btn">Verify Email</a>
            <p>If the button doesn’t work, copy and paste this link:</p>
            <span class="link">{{ $url }}</span>
        </div>

        <!-- Footer -->
        <div class="footer">
            <br>
            <br>
            &copy; {{ date('Y') }} Orbeva. All rights reserved.
        </div>
    </div>
</body>

</html>
