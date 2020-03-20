<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<form class="global-submit form-to-submit-add" action="{{$action}}" method="post" id="myform">
		{{ csrf_field() }}

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h3>First Name</h3>
                    <input type="text" name="first" value="" id="first">
                </div>
                <div class="col-sm-3">
                    <h3>Middle Name</h3>
                    <input type="text" name="middle" value="" id="middle">
                </div>
                <div class="col-sm-3">
                    <h3>Last Name</h3>
                    <input type="text" name="last" value="" id="last">
                </div>
                <div class="col-sm-3">
                    <br><br><br>
                    <button class="form-control" onclick="save()" id="buttonsave"type="submit">Save</button>
                </div>

            </div>
        </div>
        <br><br><br>
    <table>
    <tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
    </tr>
    @if($item)
        @foreach($item as $_item)
            <tr onclick="move({{$_item->id}})">
                <td>{{$_item->first_name}}</td>
                <td>{{$_item->middle_name}}</td>
                <td>{{$_item->last_name}}</td>
            </tr>
        @endforeach
    @endif
    </table>

   
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function save() {
        
        $.ajax(
        {
            url: currentLocation,
            data: form_data,
            type:method,
            success: function(data)
            {
			
            }
        });
    }

    function move(params) {

        $("<input />").attr("type", "hidden")
		.attr("name", "id")
		.attr("value", params)
		.appendTo(".form-to-submit-add");

        var form_data = $(".form-to-submit-add").serialize();
        
        var currentLocation = window.location + "/get_data";
        console.log(currentLocation);
        $.ajax(
        {
            url: currentLocation,
            data: form_data,
            type:"get",
            success: function(data)
            {
				$('#first').val(data["item"]["first_name"]);
				$('#middle').val(data["item"]["middle_name"]);
                $('#last').val(data["item"]["last_name"]);
                var btn = document.getElementById("buttonsave");
                btn.innerHTML = 'Update';
                $("#myform").attr('action', data["action"]);
                $("#myform").attr('method', "PUT");
            }
        });
    }
</script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>