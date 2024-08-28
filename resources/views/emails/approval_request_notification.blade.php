<p>Hello, {{ $approver->fname }}</p>
<p>You have a new request to approve.</p>
<p>Request Details:</p>
<ul>
    <li>User : {{ $requestDetails['attended_by'] }}</li>
    <li>Request : {{ $requestDetails['requestId'] }}</li>
    <li>Request Date: {{ $requestDetails['requestDate'] }}</li>
</ul>
<p>Please log in to the system to approve the request.</p>
