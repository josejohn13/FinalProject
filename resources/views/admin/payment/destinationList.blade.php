@extends('admin.destination.createDestination')
@extends('admin.destination.updateDestination')

<div class="float-right"> 
  <button onclick="document.getElementById('id01').style.display='block'" style="width:200px" >Add Destination</button>
  <button onclick="cancel()"style="width:200px; background-color: red">Back</button>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Destination Name</th>
      <th scope="col">Destination Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($item as $key => $_item)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$_item->destination_name}}</td>
            <td>{{$_item->destination_description}}</td>
            <td>
                <select name="details" id="details" onchange="get_data({{$_item->id}},this.value)">
                    <option value="">Action</option>
                    <option value="update">Update Destination</option>
                    <option value="delete">Delete Destination</option>
                </select>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

function get_data(params,type) {
  if(type == "update"){
    var form_data = $(".form-to-submit-add").serialize();
    var currentLocation = window.location + "/get_data?id="+params;
    $.ajax(
    {
        url: currentLocation,
        type:"get",
        success: function(data)
        {
          console.log(data);
          $('#update_name').val(data["item"]["destination_name"]);
          $('#update_desc').val(data["item"]["destination_description"]);
          $('#update_id').val(params);
          document.getElementById('id02').style.display='block';
        }
    });
  }
}
function cancel() {
  window.location.href = "/admin/dashboard";
}

</script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password], input[type=date]  {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

.

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus, input[type=date]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>