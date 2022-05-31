@if(session()->has('info'))

<div class="alert alert-info" role="alert">
    <div class="iq-alert-text"> {!! session()->get('info') !!}</div>
 </div>

@endif

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    <div class="iq-alert-text"> {!! session()->get('success') !!}</div>
 </div>
@endif

@if(session()->has('warning'))
<div class="alert alert-warning" role="alert">
    <div class="iq-alert-text">{!! session()->get('warning') !!}</div>
 </div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger" role="alert">
    <div class="iq-alert-text">{!! session()->get('error') !!}</div>
</div>
@endif