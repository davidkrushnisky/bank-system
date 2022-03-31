<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="border=1" cellpadding="10">
        <tr>
            <th>card_number</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>phone_number</th>
            <th>email</th>
            <th>address</th>
            <th>date_of_birth</th>
 
        </tr>
        @foreach($customer as $value)
        <tr>
            <td>{{$value->card_number}}</td>
            <td>{{$value->first_name}}</td>
            <td>{{$value->last_name}}</td>
            <td>{{$value->phone_number}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->address}}</td>
            <td>{{$value->date_of_birth}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>