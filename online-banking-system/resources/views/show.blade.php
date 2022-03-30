<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10">
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

    accounts
    <table border="1" cellpadding="10">
        <tr>
  <th>account_number</th>
  <th>type</th>
  <th>balance</th>
 
        </tr>
        @foreach($accounts as $value)
    <tr>
         <td>{{$value->account_number}}</td>
        <td>{{$value->type}}</td>
        <td>{{$value->balance}}</td>
       
    </tr>
    @endforeach
    </table>
    contacts
    <table border="1" cellpadding="10">
        <tr>
  <th>contact_name</th>
  <th>account_number</th>

        </tr>
        @foreach($contacts as $value)
    <tr>
        
         <td>{{$value->contact_name}}</td>
        <td>{{$value->account_number}}</td>
       
    </tr>
    @endforeach
    
    </table>
    <form action="../contact/create" method="get">
          <input type="hidden"  name="customer_id" value="{{$value->customer_id}}" invisible>

          <input type="submit" value="add new contact">
        </form>
   
   
</body>
</html>