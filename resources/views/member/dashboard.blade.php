<!DOCTYPE html>
<html>
<title>BeCool Travel & Tours</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="w3-green">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-green">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#booking" class="w3-bar-item w3-button w3-padding-large w3-hover-green">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>Booking</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-green w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#booking" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-green" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">HI</span> {{$member->customer_name}}</h1>
    <p>Welcome to BeCool Travel & Tours</p>
    <img src="{{ url('/') }}/image/becool.jpg" alt="boy" class="w3-image" width="30%" height="1108">
  </header>

<br><br><br><br>
  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="booking">
    <header class="w3-container w3-padding-32 w3-center w3-green" id="home">
        <h1 class="w3-jumbo">Booking</h1>
    </header>
    
    <div class="w3-row">
    @foreach($book as $key => $item)
        <div class="w3-white w3-container w3-quarter w3-border" >
            <h2>{{$item->destination->destination_name}}</h2>
            <img style="width:100%; height:120px" src="{{ url('/') }}/image/{{$item->destination->destination_name}}.jpg" onclick="image_click({{$item->id}})" class="w3-border w3-padding" alt="No Image Available">
            @if($item->member_id == null)
                <div>Available for booking</div>
            @else
                <div>Fully Booked</div>
            @endif
        </div>
    @endforeach
    </div>

    
    <!-- Grid for pricing tables -->
    <!-- <h3 class="w3-padding-16 w3-text-light-grey">BOOKING SELECTION</h3>
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half w3-margin-bottom">
        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off" >
          <li class="w3-dark-grey w3-xlarge w3-padding-32">DESTINATION</li>
          <li class="w3-light-grey w3-padding-24">
            <select id="destination" name="destination" class="destination form-control" style="width:300px" onchange="select(this.value)">
                <option value="" hidden><li class="w3-padding-16">Select Destination</li></option>
            </select>
          </li>
          
        </ul>
      </div>
      <div class="w3-half w3-margin-bottom">
        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off" id="menu">
            <li class="w3-dark-grey w3-xlarge w3-padding-32">DESCRIPTION</li>
            <li class="w3-light-grey w3-padding-24" id="description"></li>
        </ul>
      </div> -->
    <!-- End Grid/Pricing tables -->
    <!-- </div>
    <button class="w3-btn w3-round-xlarge w3-yellow" onclick="book_now()">Book Now</button> -->

<!-- END PAGE CONTENT -->
</div>

</body>
<div id="myModal" class="w3-modal w3-grey">
 <span class="w3-text-white w3-xxlarge w3-hover-text-grey w3-container w3-display-topright" onclick="closeModal()" style="cursor:pointer">×</span>
 <div class="w3-modal-content">

  <div class="w3-content" style="max-width:1200px">
   <img class="mySlides" id="modal_image" style="width:100%">
   <div class="w3-row w3-white w3-center">
        <div id="destination_description"></div>
        <div  id="book_description"></div>
        <div  id="book_type"></div>
        <div  id="book_date"></div>
   </div> <!-- End row -->
  </div> <!-- End w3-content -->
  <br>
   <button class="w3-button w3-block w3-red" style="width:100%" onclick="book_now()">Book Now</button>
  
 </div> <!-- End modal content -->
</div> <!-- End modal -->

</div>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">


var destinations = null;
var set_id = null;
$(window).load(function(){ 
    get_data()
 })


function get_data() {
        
        var currentLocation = "/member/dashboard/get_destination";
        $.ajax(
        {
            url: currentLocation,
            type:"get",
            success: function(data)
            {
                destinations = data;
                // data.forEach(element => {
                //     $('.destination').append($('<option>', { 
                //         value: element.id,
                //         text : element.destination.destination_name 
                //     }));
				// });
            }
        });
}
function book_now() {
        if(set_id != null){
            var currentLocation = "/member/dashboard/get_destination/book_now";
            $.ajax(
            {
                url: currentLocation,
                data: {"id" : set_id},
                type:"get",
                success: function(data)
                {
                    alert(data["message"]);
                    if(data["status"] == "success"){
                        window.location.href = "/member/dashboard";
                    }else{
                        window.location.href = "/";
                    }
                }
             });
        }else
        {
            alert("Please select destination to proceed.");
        }
}
function image_click(params) {
    set_id = params
    for(let data of destinations){
        // alert(data.id,params);
        if(params == data.id){
            if(data.member_id == null){
                document.getElementById('myModal').style.display = "block";
                var test = "http://crudsample.test/image/"+data.destination.destination_name+".jpg";
                $('#modal_image').attr('src', test)
                $("#destination_description").html(data.destination.destination_description);
                $("#book_description").html(data.book_description);
                $("#book_type").html(data.book_type);
                $("#book_date").html(data.book_date);
            }else{
                alert("Sorry. This destination is already fully booked.")
            }
        }
    }
}

function select(params) {
    set_id = params
    for(let data of destinations){
        if(params == data.id){
            $("#description").html(data.destination.destination_description);
        }
    }
    // $("#menu").append('<li class="w3-light-grey w3-padding-24">asdfsadfsafsdaf</li>');
}
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}
</script>
