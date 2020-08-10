<!doctype html>
<html>
<head>
    <title>Success</title>
    <meta charset="utf-8">
</head>

<body>

<h1>Thanks For your order</h1>

{{ $contents }}

@php

   echo"
<script>

var contents = $contents;
 console.log(contents);

</script>


";

@endphp

</body>


</html>
