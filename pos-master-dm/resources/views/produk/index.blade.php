@extends('layouts.app')

@section('title')
  FORM PRODUK
@endsection

@section('breadcrumb')
   @parent
   <li>produk</li>
@endsection

@section('content')     
<hr/>
<script src="{{asset('vendor/jquery/jquery-2.2.0.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('js/numeral.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.css')}}">
<form action="#" method="post"  id="form_produk">
  <div class="form-group row">
        <label for="sales" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required>
			<input type="hidden" class="form-control" id="id" name="id" >
        </div>
		<label for="customer" class="col-sm-2 col-form-label">Harga Produk</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" style="text-align:right" id="harga" name="harga" placeholder="Harga Produk" required>
        </div>
    </div>
	<hr/>	
	<div class="form-group col-md-4" >
	  <input type="submit" id="submit" class="btn btn-primary" value="Add">
	</div>  	
 </form> 
 <table class="table" id="table-prod" style="font-size:14px">
  <thead>
    <tr>
      <th scope="col">#</th>
	  <th scope="col">Aksi</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Harga Produk</th>
    </tr>
  </thead>
	 <tbody>
     </tbody>
</table> 	  
<script type="text/javascript" src="{{asset('js/jquery.number.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.css')}}">	
<script type="text/javascript">
$('#name').focus();
$('#harga').number( true,0 );
$.ajax({
						url: "http://localhost:8081/produk/view",
						data : "",
						type: "get",
						"headers": {
							  "accept": "application/json",
							  "Access-Control-Allow-Origin":"*"
						  },
						dataType: "json",
						 crossDomain: true,
						success: function (response) {
						   $('#table-prod > tbody').html("");
						   var table = "";
						   
						   $.each(response, function( index, value ) {				
							table +=  "<tr><th>"+(index+1)+"</th><th><a onclick='edit_prod("+value.id+")' class='fa fa-pencil' aria-hidden='true' style='margin-right:15px'></a><a onclick='delete_prod("+value.id+")' class='fa fa-trash' aria-hidden='true'></a></th><th>"+value.name+"</th><th>"+numeral(value.harga).format('0,0')+"</th></tr>";
						   });
						   $('#table-prod > tbody').html(table);
						}
		})
		
		$(document).ready( function(e) {
		  $('#form_produk').submit(function(e) {
			  	e.preventDefault();
				$('.required').each(function(){
					if( $(this).val() == "" ){
					  alert('Please fill all the fields');

					  return false;
					}
				});
				
				e.preventDefault();
				
					$.ajax({
						url: "http://localhost:8081/produk/save",
						type: "post",
					    data: $("#form_produk").serialize(),
					    success: function (response) {
							$('#form_produk').trigger("reset");	
							 location.reload();
						}
					});
				
				return false;


			});
			document.getElementById("form_produk").addEventListener("submit", function(event){
			  event.preventDefault()
			});
			return false;
		})
		
		 document.getElementById("form_produk").addEventListener("submit", function(event){
		  event.preventDefault()
		  
		});	

function delete_prod(id){
				$.get( "http://localhost:8081/produk/del/"+id, function( data ) {
				  location.reload();
				});
}
function edit_prod(id){
				$('#form_produk').trigger("reset");	
				$("#submit").attr("value","Update");
				$.post( "http://localhost:8081/produk/get_all/"+id, function( data ) {
					
					jQuery.each( data, function( i, val ) {
					  $( "#" + i ).val(val);
					});
					$('#name').focus();
					
				});
}
</script>
@endsection