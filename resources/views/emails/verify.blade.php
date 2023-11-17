@component('mail::message')

<p>Hello {{$user->name}},</p>

<p>Please click the following link to verify your email address:</p>

@component('mail::button',['url' => url('verify/'.$user->remember_token)])
Verify Email
@endcomponent

Thanks 
    
@endcomponent