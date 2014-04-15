<h1>Hi, {{ $first_name }}!</h1>
 
<p>Your item has been posted!</p>
<p>To edit or delete your post, please click here: {{ URL::to('lostItems/{$foundItem->token}') }}.</p>