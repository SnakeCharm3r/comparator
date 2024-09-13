<style>
    body {
        font-family: Arial, sans-serif;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .content {
        margin: 20px 0;
    }

    .signature {
        margin-top: 30px;
    }
</style>

<div class="header">
    {{-- <img src="{{ asset('assets/img/ccbrt.JPG') }}" alt="CCBRT Logo" style="height: 50px;"> --}}
    <h2>{{ $policy->title }}</h2>
</div>

<div class="content">
    {!! $policy->content !!}
</div>

<div class="signature">
    <p><strong>Names:</strong> {{ $user->fname }} {{ $user->lname }}</p>
    <p><strong>Signature:</strong></p>
    @if ($user->signature)
        {{-- <img src="data:image/png;base64,{{ $user->signature }}" alt="User Signature" style="max-width: 40%; height: auto;"> --}}
    @else
        <p>______________________________</p>
    @endif
    <p><strong>Date:</strong> {{ now()->format('d-m-Y') }}</p>
</div>

</div>

<script>
    function downloadPolicy() {
        const policy = policies[currentPolicyIndex];
        const url = `{{ route('download.policy') }}?policy_id=${policy.id}`;
        window.location.href = url;
    }
</script>

{{-- </div>
    </div> --}}
{{-- @endsection --}}
