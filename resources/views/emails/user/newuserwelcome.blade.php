@component('mail::message')
# Welcome {{ $user->name }} to Laravel Blog

You have successfully **registered**!

@component('mail::panel')
Email address signed up with is: {{ $user->email }}
@endcomponent

@component('mail::button', ['url' => 'http:://my-blog.test/home'])
Your dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
