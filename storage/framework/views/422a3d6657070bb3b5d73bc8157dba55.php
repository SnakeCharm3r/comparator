<p>Dear, <?php echo e($approver->fname); ?></p>
<p>You have a new request awaiting your approval.</p>
<p>Request Details:</p>

<ul>
    <li>Requester Name : <?php echo e($requestDetails ['forwarded_by']); ?>

,    <li>Requested Form : <?php echo e($requestDetails['request']); ?></li>
    <li>Date of Request: <?php echo e($requestDetails['requestDate']); ?></li>
</ul>
<p>Please log in to e-Docs system to approve the request .</p>
<p>Using the below link <a href="http://127.0.0.1:8000/"> e-Docs System</a></p>
<p>Regards</p>
<p>CCBRT IT Support Desk</p>
<?php /**PATH D:\Projects\E-docs\resources\views/emails/approval_request_notification.blade.php ENDPATH**/ ?>