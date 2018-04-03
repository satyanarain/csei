<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
<h2>Hi, {{$name}}</h2>
<br/>
Your request for  Rs. {{$amount}}  has been rejected.
 {{--$rejector_name--}}
for reason(s) given below:
<br/>
<br/>
{{$comments}}
<br/>
<br/>
Thanks,<br/>
CSEI team
</body>
</html>