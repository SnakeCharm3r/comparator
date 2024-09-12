<p>Dear, {{ $approver->fname }}</p>
<p>You have a new request awaiting your approval.</p>
<p>Request Details:</p>
{{-- {{dd($requestDetails)}} --}}
<ul>
    <li>Requester Name : {{$requestDetails ['forwarded_by']}}
    <li>Requested Form : {{ $requestDetails['request'] }}</li>
    <li>Date of Request: {{ $requestDetails['requestDate'] }}</li>
</ul>
<p>Please log in to e-Docs system to approve the request .</p>
<p>Using the below link <a href="http://127.0.0.1:8000/"> e-Docs System</a></p>
<p>Regards</p>
<p>CCBRT IT Support Desk</p>
