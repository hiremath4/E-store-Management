<!DOCTYPE html>
<html lang="en">
<title>E-store PC-payment</title>
<?php include "header.php";
 require_once "includes/class_autoloader.php"; ?>
<head>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>
    body{
        margin: 0;
    }
    .container{
        border:2px solid black;
        margin-top:20px;
        align-items:center;
        justify-content:center;
    }
    .button{
border:2px solid black;
background:blue;
align-items:center;
padding: 10px;
justify-content:center;
color:black;
border-radius:5px;
margin-right:600px;
cursor:pointer;
    }
    h1{
        text-align:center;
        font-size:25px;
        color:red;

    }
    hr{
        color:red;
    }
    </style>

</head>
<body>
    
    <div class="container">
    <h1>PAYMENT</h1>
    <hr>
<form>

    
    <center>
    <div class="col s8">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="name" type="text" placeholder=" " name="name" class="validate white-text">
              <label class="active cyan-text" for="name">Name </label>
              <span class="helper-text grey-text" data-error="CardHolder Name" data-success="CardHolder Name"></span>
            </div>

            
          </div>
    
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">money</i>
              <input id="amt" type="text" placeholder="" name="amt" class="validate white-text">
              <label class="active cyan-text" for="name" >amount</label><span class="helper-text grey-text" data-error="CardHolder Name" data-success="CardHolder Name"></span>
            </div>
<br>
<br>

            
          </div>
    
    <input type="button" class="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
</center>
</form>

<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process1.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_3bNGKajNzB7cmD", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "E-store",
                        "description": "Test Transaction",
                        "image": "/static/logo.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process1.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="payment_done.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
    </script>
    </div>
</div>
    </body>
<?php include "footer.php"; ?>
</html>