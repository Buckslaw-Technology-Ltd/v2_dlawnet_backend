<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Email</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap');

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 100%;
            height: 100%;
            padding: 50px 0;
            display: flex;
            gap: 5px;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        .card {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 60%;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            background-color: #fff;
        }

        .header {
            width: 100%;
            height: 300px;
            background-image: url('./img/bg1.jpg');
            background-size: 160%;
            background-position: center;
        }

        .dark-op {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(19, 18, 18, 0.2);
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            border-radius: 50%;
            width: 120px;
            height: 120px;
        }

        .logo-svg {
            width: 90px;
        }

        h1 {
            color: #fff;
            font-size: 3 xl;
            font-weight: bold;
            text-align: center;
        }

        .content {
            padding: 20px;
            background-color: #fff;
        }

        .content a {
            text-decoration: none;
        }

        p {
            color: #777;
        }

        .btn {
            background-color: rgb(250, 91, 34);
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        ul {
            list-style-type: disc;
            list-style-position: inside;
            margin: 2px;
            margin-left: 4px;
        }

        ul li {
            color: gray;
        }

        .ending {
            margin-top: 10px;
            color: gray;
        }

        .footer {
            background-color: rgb(250, 91, 34);
            padding: 20px;
            width: 100%;
            color: #fff;
            text-align: center;
            font-size: small;
        }

        .footer p {
            color: #fff;
            font-size: 1.1em;
        }

        @media screen and (max-width: 600px) {
            .card {
                width: 90%;
            }

            .header {
                height: 150px;
            }

            h1 {
                font-size: 1.2em;
            }

            .logo {
                width: 90px;
                height: 90px;
            }

            .logo-svg {
                width: 60px;
            }

            ul {
                list-style-position: initial;
            }
        }
    </style>

</head>
<body>
<div class="container">
    <div class="card">
        <div class="header">
            <div class="dark-op">
                <div class="logo">
                    <img class="logo-svg" src="/img/logo.svg" alt="logo" width="80px">
                </div>
                <h1>Welcome to DlawNet Community!</h1>
            </div>
        </div>
        <div class="content">
            <p>Hello {{$first_name . ' ' . $last_name}},</p>
            <p>Thank you for joining our vibrant social media community. We're excited to have you on board! To complete
                your registration, copy the verification code below:</p>
            <p>{{$code}}</p>
            <p>By verifying your email, you'll unlock a world of connections, updates, and interactions with friends and
                like-minded individuals.</p>
            <p>Here's a taste of what you can expect:</p>
            <ul>
                <li>Connect with friends and family across the globe.</li>
                <li>Discover new communities and join discussions on topics you love.</li>
                <li>Share your moments, stories, and experiences with the world.</li>
                <li>Stay updated with the latest trends and news.</li>
            </ul>
            <p>If you ever have any questions or need assistance, our support team is here to help. Feel free to contact
                us at [Support Email], and we'll be more than happy to assist you.</p>
            <p>
                We're thrilled to have you as part of our community and look forward to seeing you online!<br>
            </p>
            <span class="ending">Best regards,<br>The Weild Team</span>
        </div>
        <div class="footer">
            <p>This email was sent to {{$email}}<br><a href="#" style="color: #fff;">Unsubscribe</a></p>
        </div>
    </div>
</div>
</body>
</html>
