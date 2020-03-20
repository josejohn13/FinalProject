<!DOCTYPE html>
<html>
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
<body>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form id="updateform"class="modal-content" action="/booking/submit/update" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="container">
      <h1>Update Booking</h1>
      <hr>
      <label for="email"><b>Book Date</b></label>
      <input type="date" placeholder="" id="update_date"name="book_date" required>

      <label for="email"><b>Book Type</b></label>
      <input type="text" placeholder="Enter Type" id="update_type"name="book_type" required>

      <label for="psw"><b>Book Description</b></label>
      <input type="text" placeholder="Enter Description" id="update_desc"name="book_description" required>
      <input type="text" id="update_id" name="id" hidden>
      <label for="email"><b>Book Destination</b></label>
      <div>
        <select name="destination" class="destination form-control">
          <option value="" hidden>Select Destination</option>
        </select>
      </div>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Submit</button>
      </div>
    </div>
  </form>
</div>

<script>

$(document).ready( function () {
  // get_destination();
	});

  function get_destination(params) {

$('.destination')
      .find('option')
      .remove()
      .end()
      .append('<option value="">Select Destination</option>')
      .val('whatever');
var currentLocation = window.location + "/destination";
$.ajax(
    {
          url: currentLocation,
          // data: form_data,
          type:"get",
          success: function(data)
          {
            console.log(data);
            
            for(let item of data.destination){
              $('.destination').append($('<option>', { 
                value: item.id,
                text : item.destination_name 
              }));
            }
          }
    });
}
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
