<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/maps/maps-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/services/services-web.min.js"></script>
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    header, footer{
        background-color:lightgrey;
    }
    body {
        background-color: gray;
    }
    #map {
        width: 100vw;
        height: 100vh;
    }
</style>
<body>
    <header>header</header>
        <div id='map' class='map'></div>
 <!-- Replace version in the URL with desired library version -->
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/maps/maps-web.min.js'></script>
    <script>
      tt.setProductInfo('<your-product-name>', '<your-product-version>');
      tt.map({
          key: 'v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC',
          container: 'map'
      });
    </script>
    <footer>footer</footer>
</body>
</html>
