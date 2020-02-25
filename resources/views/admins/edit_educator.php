<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit educator</title>
</head>
<body>

<p>First name: {{ $educator->first_name }}</p>
<p>Last name: {{ $educator->last_name }}</p>
<p>Age: {{ $educator->age }}</p>
<p>Linkedin: {{ $educator->linkedin }}</p>
<p>Image: {{ $educator->image_url }}</p>
<p>Title: {{ $educator->title }}</p>
<p>Biography: {{ $educator->biography }}</p>
<p>Education: {{ $educator->education }}</p>

</body>
</html>
