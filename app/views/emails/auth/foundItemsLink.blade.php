<h3>Hi, {{ $email }}!</h3>
 
<p>Your item has been posted!</p>
<p>To edit or delete your post, please click here: {{ action('FoundItemsController@edit', $id) }}?token={{$token}}</p>