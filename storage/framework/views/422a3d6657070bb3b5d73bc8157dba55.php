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
        }

        h2 {
            color: #007A33;
        }

        .container {
            padding: 20px;
            border: 1px solid #ddd;
            margin: 20px;
        }

        .header {
            background-color: #007A33;
            color: white;
            padding: 10px;
            text-align: center;
            position: relative;
        }

        .header img {
            position: absolute;
            left: 10px;
            top: 10px;
            height: 40px;
            width: 40px;
        }

        a {
            color: #007A33;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .footer img {
            height: 50px;
            width: auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <!-- Replace with your favicon or logo URL -->
            <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Logo">
            <h2>e-Docs System - Approval Request</h2>
        </div>

        <p>Dear <?php echo e($approver->fname); ?>,</p>

        <p>You have a new request awaiting your approval in the e-Docs system.</p>

        <p><strong>Request Details:</strong></p>
        <ul>
            <li><strong>Requester Name:</strong> <?php echo e($requestDetails['forwarded_by']); ?></li>
            <li><strong>Requested Form:</strong> <?php echo e($requestDetails ['request']); ?></li>
            <li><strong>Date of Request:</strong> <?php echo e($requestDetails['requestDate']); ?></li>
        </ul>

        <p>Please log in to the e-Docs system to approve or reject the request using the following link:</p>
        <p><a href="http://192.168.14.244:8000/">e-Docs System</a></p>

        <p>Regards,</p>
        <p><strong>CCBRT IT Support Desk</strong></p>

        <!-- Footer Section -->
        <div class="footer">
            <!-- Replace with your footer image URL -->
            <img src="<?php echo e(asset('assets/img/footer_logo.png')); ?>" alt="Footer Logo">
            <p>&copy; 2024 CCBRT IT Support Desk. All Rights Reserved.</p>
        </div>
    </div>

</body>

</html>
<?php /**PATH D:\Projects\E-docs\resources\views/emails/approval_request_notification.blade.php ENDPATH**/ ?>