


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Request Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007A33;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .header img {
            height: 60px;
            width: auto;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
            color: #fff;
        }

        p {
            margin: 10px 0;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            margin-bottom: 5px;
        }

        a {
            color: #007A33;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .footer img {
            /* height: 100px; */
            /* Increased the height for a larger footer image */
            width: 100%;
            /* Ensures the image spans the entire footer width */
            object-fit: cover;
            /* Maintains aspect ratio while covering the footer */
        }

        /* Improve text layout */
        .content {
            padding: 15px;
            font-size: 16px;
            line-height: 1.6;
        }

        .footer-text {
            margin-top: 10px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="https://newsite.ccbrt.org/wp-content/uploads/2021/12/cropped-CCBRT_OFFICIAL_LOGO.jpg"
                alt="Logo">
            <h2>e-Docs System - Approval Request</h2>
        </div>

        <div class="content">
            <p>Dear <?php echo e($approver->fname); ?>,</p>

            <p>You have a new request awaiting your approval in the e-Docs system.</p>

            <p><strong>Request Details:</strong></p>
            <ul>
                <li><strong>Requester Name:</strong> <?php echo e($requestDetails['forwarded_by']); ?></li>
                <li><strong>Requested Form:</strong> <?php echo e($requestDetails['request']); ?></li>
                <li><strong>Date of Request:</strong> <?php echo e($requestDetails['requestDate']); ?></li>
            </ul>

            <p>Please log in to the e-Docs system to approve or reject the request using the following link:</p>
            <p><a href="http://192.168.14.244:8000/">e-Docs System</a></p>

            <p>Regards,</p>
            <p><strong>CCBRT IT Support Desk</strong></p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <img src="https://ci3.googleusercontent.com/mail-sig/AIorK4yVBcxuubxZyVOqjc2pjJQQbWTCGT47UwuYDQJVgQEUIePd3iKM7pgwWnpdqElgXvkwKnBFWAk"
                alt="Footer Logo">
            <div class="footer-text">Powered by CCBRT e-Docs System</div>
        </div>
    </div>

</body>

</html>
<?php /**PATH D:\Projects\E-docs\resources\views/emails/approval_request_notification.blade.php ENDPATH**/ ?>