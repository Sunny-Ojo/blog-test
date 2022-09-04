@component('mail::message')
# Hi {{$user->name}},

We have a new post for  you on {{$post->category->name}}, please read the details below.


{{$post->title}},

{{$post->description}}
@component('mail::button', ['url' => route('posts.show',  $post->id)])
Read full article
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
