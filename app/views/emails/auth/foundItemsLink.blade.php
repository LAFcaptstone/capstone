<h1>Hi, {{ $email }}!</h1>
 
<p>Your item has been posted!</p>
<p>To edit or delete your post, please click here: {{ URL::to('editFoundItem') }}/{{$id}}/{{$token}}</p>