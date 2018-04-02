<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
<h2>Hi, {{$name}}</h2>
<br/>
Your  request of amount Rs {{$amount}}  has been rejected.
 {{--$rejector_name--}}
for following reason given below:
<br/>
<br/>
{{$comments}}
<br/>
<br/>
Thanks,<br/>
</body>
</html>