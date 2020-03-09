<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Style the header */
        header {
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

        /* Create two columns/boxes that floats next to each other */
        nav {
            float: left;
            width: 30%;
            height: 300px; /* only for demonstration, should be removed */
            background: #ccc;
            padding: 20px;
        }

        /* Style the list inside the menu */
        nav ul {
            list-style-type: none;
            padding: 0;
        }

        article {
            float: left;
            padding: 20px;
            width: 70%;
            background-color: #f1f1f1;
            height: 300px; /* only for demonstration, should be removed */
        }

        td {
            margin-left:300px;
        }

        /* Clear floats after the columns */
        section:after {
            content: "";
            display: table;
            clear: both;
            min-height: 340px;
        }

        /* Style the footer */
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
        @media (max-width: 600px) {
            nav, article {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>

@include('includes.header')

<section>
    <nav>
        <ul>
            <li><a href="/">Homepage</a> </li>
            <li><a href="/admin/">Admin panel</a></li>
                @if(Request::is('admin'))
            <li><a href="/admin/educators">Show all educators</a></li>
            <li><a href="/admin/students">Show all students</a></li>
            <li><a href="/admin/users">Show all users</a></li>
                @endif
                @if(!Request::is('admin'))
            <li><a href="/educators">Show educators</a></li>
            <li><a href="/courses">Show courses</a></li>
                @endif
        </ul>
    </nav>

    @yield('content')

</section>


@include('includes.footer')

</body>

</html>