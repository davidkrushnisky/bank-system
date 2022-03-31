<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account page</title>
    <link rel="stylesheet" href="css/dashboard_style.css"  />
   
</head>
<body>
    <header class="header">
        <nav class="nav">
        <div>
            <img class="pt-2"
                src="img/bank_icon.png"
                alt="Bankist logo"
            />
            <h2>Transfer Easy</h2>
        </div>
          
          <ul class="nav__links">
            <li class="nav__item">
              <a class="nav__link" href="index.html">Home</a>
            </li>
            <li class="nav__item">
              <a class="nav__link nav__link--btn" href="index.html"
                >Log out</a>
            </li>
          </ul>
        </nav>
    </header>
        <h1> My profile </h1>
        <h2>Welcome: {{$fName}} , {{$lName}}</h2>

        <div class="grid-container">
            <div class="grid-item">
            <h3 class="grid-header">Card Number</h3>
            <h3 class= "grid-content">{{$card}}<br></h3> 
             
            </div>
             <div class="grid-item">
              
            <h3 class="grid-header">Date Of Birth</h3>
            <h3 class= "grid-content">{{$doB}}<br> 
            </div>
            <div class="grid-item">
               
            <h3 class="grid-header">Phone Number</h3>
            <h3 class= "grid-content">{{$phone}}<br></h3> 
            <button class="edit">Edit</button>   
            </div>
           
            <div class="grid-item">
              
            <h3 class="grid-header">Email</h3>
            <h3 class= "grid-content">{{$email}}<br></h3> 
            <button class="edit">Edit</button>   
            </div>
            <div class="grid-item">
             
            <h3 class="grid-header">Address</h3>
            <h3 class= "grid-content">{{$address}}</h3> 
            <button class="edit">Edit</button>   
            </div>
           
          </div>
          <h1>banking</h1>
          <div class="grid-container">
            <div class="grid-item1">
            <h3 class="grid-header1">Account Number</h3>
            <h4 class= "grid-content1">{{$account}}<br></h4> 
            </div>
            <div class="grid-item1">
                <h3 class="grid-header1">Type</h3>
                <h4 class= "grid-content1">{{$type}}<br></h4> 
                </div>
                <div class="grid-item1">
                    <h3 class="grid-header1">Balance </h3>
                    <h4 class= "grid-content1">{{$balance}}</h4>
                    </div>

          </div>

          <h1>Activity</h1>
          <div class="table">
           <table>
               <thead>
               <tr>
                   <th>Date</th>
                   <th>Deposits</th>
                   <th>Withdrawals</th>
                   <th>Balance</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                <td>2022/03/30</td>
                <td></td>
                <td>$500</td>
                <td>$500</td>
               </tr>
               <tr>
                <td>2022/03/28</td>
                <td>$1000</td>
                <td></td>
                <td>$1000</td>
               </tr>
            </tbody>
           </table>
          </div>

          <h1>My Contact List</h1>
          <div class="table">
              <form method="Post" id="my_form"></form>
            <table>
                <thead>
                <tr>
                    <th>Option</th>
                    <th>Contact Name</th>
                    <th>Account Number</th>
                    <th>Amount</th>
                    <th>Transfer</th>
                   
                </tr>
             </thead>
             <tbody>
                <tr>
                    <td><input type ="checkbox" name=checkbox></td>
                 <td>Tom</td>
                 <td>1234567</td>
                 <td><input type="number" name="amount" form="my_form"/></td>
                 <td><button type="button" form="my_form">Send Money</button></td>
                </tr>
             </tbody>
            </table>
           </div>

           <h1>Money Receive</h1>

           <div class="table">
            <form method="Post" id="my_form"></form>
          <table>
              <thead>
              <tr>
                  <th>Option</th>
                  <th>Contact Name</th>
                  <th>Account Number</th>
                  <th>Amount</th>
                  <th>Confirm</th>
                 
              </tr>
           </thead>
           <tbody>
              <tr>
                  <td><input type ="checkbox" name=checkbox></td>
               <td>Tom</td>
               <td>1234567</td>
               <td>$300</td>
               <td><button type="button" form="my_form">Accept</button></td>
              </tr>
           </tbody>
          </table>
         </div>

          <footer class="footer">
            <ul class="footer__nav">
              <li class="footer__item">
                <a class="footer__link" href="#">About</a>
              </li>
              <li class="footer__item">
                <a class="footer__link" href="#">Terms of Use</a>
              </li>
              <li class="footer__item">
                <a class="footer__link" href="#">Contact Us</a>
              </li>
            </ul>
            
            <p class="footer__copyright">
              &copy; Copyright by Blue Team. 
            </p>
          </footer>
      
    
</body>
</html>