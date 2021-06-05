@component('mail::message')
# Introduction

{{$liker->name}} liked your post.

@component('mail::button', ['url' => route('post.show', $post)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent