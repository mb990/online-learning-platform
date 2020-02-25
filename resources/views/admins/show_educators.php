<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VIEW ALL EDUCATORS</title>
</head>
<body>

    <h2>All educators:</h2>


    @foreach ($educators as $educator)

    'First name: ' . $educator->first_name . '<br>';
    'Last name: ' . $educator->last_name . '<hr>';

    <a href="/admin/educators/edit/">Edit</a>'

    @endforeach

?>

</body>
</html>
