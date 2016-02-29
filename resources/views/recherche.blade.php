<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <meta charset="UTF-8"> 
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <link href="/css/datepicker.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        
        @yield('content');

        <!-- Latest compiled and minified JavaScript -->
        <script src="/js/jquery.min.js" ></script>
        <script src="/js/moment.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/js/bootstrap-datepicker.js" ></script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </body>
</html>