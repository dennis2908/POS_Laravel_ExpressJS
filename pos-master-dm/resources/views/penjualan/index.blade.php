<httpProtocol>
    <customHeaders>
       <add name="Access-Control-Allow-Headers" value="Origin, Authorization, X-Requested-With, Content-Type, Accept" />
       <add name="Access-Control-Allow-Methods" value="POST,GET,OPTIONS,PUT,DELETE" />
    </customHeaders>
</httpProtocol>
@extends('layouts.app')
@section('title')
  FORM PENJUALAN
@endsection

@section('breadcrumb')
   @parent
   <li>penjualan</li>
@endsection

@section('content')     
<hr/>
<script src="{{asset('vendor/jquery/jquery-2.2.0.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('js/numeral.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.css')}}">
<form action="#" method="post"  id="form_penjualan">
  <div class="form-group row">
        <label for="sales" class="col-sm-2 col-form-label">Nama Sales</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="sales" name="sales" placeholder="Nama Sales" required>
			<input type="hidden" class="form-control" id="id" name="id" >
        </div>
		<label for="customer" class="col-sm-2 col-form-label">Nama Pelanggan</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="customer" name="customer" placeholder="Nama Pelanggan" required>
        </div>
    </div>
	<hr/>
	<div class="well clearfix">
        <div id="czContainer">
            <div id="first">
                <div class="recordset">
                    <div class="fieldRow clearfix">	
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nama Barang</label>
								<div class="col-sm-3">
									<input type="text" onkeyup="autocomp(this.id)" id="id_1_product" placeholder="Ketik untuk cari" class="barang form-control" required/>
									<input type="hidden" id="id_1_product_h" class="id_brg" required/>
								</div>
								<label class = "col-sm-1 col-form-label">Harga</label>
								<label id="id_1_product_p" class = "harga col-sm-2 col-form-label" onchange="format_h(this.id)"></label>
								<label class = "col-sm-1 col-form-label">Jumlah</label>
								<div class="col-sm-2">
									<input type="text" class="jmlh form-control" id="id_1_product_j" onkeyup="jumlah(this.id)" style="text-align:right" value=0 required/>
								    <input type="hidden" id="id_1_product_j_p" value=0 required>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<hr/>
	<div class="form-group row">
        <label for="total" class="col-sm-2 col-form-label">Total Penjualan</label>
        <div class="col-sm-4">
            <input type="text" name="total" class="form-control" id="total" style="text-align:right" readonly value=0>
        </div>
		<label for="dibayar" class="col-sm-2 col-form-label">Total Dibayar</label>
        <div class="col-sm-4">
            <input type="text" name="dibayar" class="form-control"  id="dibayar" style="text-align:right" required value=0>
        </div>
    </div>
	<div class="form-group row">
        <label for="kembalian" class="col-sm-2 col-form-label">Total Kembalian</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="kembalian" name="kembalian" style="text-align:right"  readonly value=0>
        </div>
    </div>
	<hr/>	
	<div class="form-group col-md-4" >
	  <input type="submit" id="submit" class="btn btn-primary" value="Add">
	</div>  	
 </form> 
 <table class="table" id="table-trans" style="font-size:14px">
  <thead>
    <tr>
      <th scope="col">#</th>
	  <th scope="col">Aksi</th>
      <th scope="col">Nama Customer</th>
      <th scope="col">Nama Sales</th>
	  <th scope="col">Detail Penjualan</th>
      <th scope="col">Total Pembelian</th>
	  <th scope="col">Total Pembayaran</th>
	  <th scope="col">Total Kembalian</th>
    </tr>
  </thead>
	 <tbody>
     </tbody>
</table> 	  	
<script type="text/javascript" src="{{asset('js/jquery.czMore-1.5.3.2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.number.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.css')}}">	
    <script type="text/javascript">
        //One-to-many relationship plugin by Yasir O. Atabani. Copyrights Reserved.
        $("#czContainer").czMore();
		$("#btnPlus").click();
		$('#sales').focus();
		
		$('#dibayar').number( true,0 );
		$('#kembalian').number( true,0 );
		$('#total').number( true,0 );
		
		function autocomp(id){
			var get_id = [];
			$("#czContainer .id_brg").each(function(e){	
			   if(this.value != "")
			   {
					get_id.push(this.value);
			   }	
			});
			jQuery('#'+id).autocomplete({
			source: "http://localhost:8081/trans/get_brg?id="+get_id,
			select: function( event, ui ) {
		          $( "#"+id ).val(ui.item.name);
				  $( "#"+id+"_h" ).val(ui.item.id);
				  $( "#"+id+"_p" ).text(ui.item.harga);
				  $( "#"+id+"_j_p" ).val(ui.item.harga);
				  $( "#"+id+"_p" ).trigger("change");
				  $( "#"+id+"_j" ).trigger("keyup");
                  return false;
               }
			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
               return $( "<li>" )
               .append( "<a>" + item.name+"</a>" )
               .appendTo( ul );
            };
			
			}
			
			function jumlah(id){
				$('#'+id).number( true,0 );
				var tot = 0;
				$("#czContainer .jmlh").each(function(e){	
					  id = this.id;
					  tot += parseInt(this.value)*parseInt($("#"+id+"_p").val());
					  $('#total').val(tot);
				});
			}	
			
			function delete_trans(id){
				$.get( "http://localhost:8081/trans/del/"+id, function( data ) {
				  location.reload();
				});
			}
			
			function edit_trans(id){
				$('.recordset').slice(1).remove();
				$('#form_penjualan').trigger("reset");	
				$("#btnMinus").click();
				$("#submit").attr("value","Update");
				$.post( "http://localhost:8081/trans/get_all/"+id, function( data ) {
					
					jQuery.each( data, function( i, val ) {
					  $( "#" + i ).val(val);
					});
					barang = data.barang;
					arr_barang = barang.split(",");
					jmlh = data.jmlh;
					arr_jmlh = jmlh.split(",");
					
					var j=1;
					
					jQuery.each( arr_barang, function( i, val ) {
						$("#btnPlus").click();	
					});
					var i = 0;
					$("#czContainer .jmlh").each(function(e){	
					    this.value  =  arr_jmlh[i];
						id_brg = (this.id).substring(0, (this.id).length - 1);
						$("#"+id_brg+"h").val(arr_barang[i]);
						var brg = function () {
								var tmp = null;
								$.ajax({
									'async': false,
									'type': "POST",
									'global': false,
									'url': "http://localhost:8081/trans/get_brg_by_id/"+arr_barang[i],
									'success': function (data) {
										tmp = data;
									}
								});
								return tmp;
						}();
						
						nm_brg = id_brg.substring(0, id_brg.length - 1);
						$("#"+nm_brg).val(brg.name);
						$("#"+id_brg+"p").text(brg.harga).trigger("change");
						
						i++;
					});
					
					 $('#sales').focus();
					
					});
			}
			
			function format_h(id){
				$('#'+id).number( true,0 );
			}	
			
		$('#dibayar').keyup(function() {
			if($("#total").val()!=0)
			{
			   var kembalian = parseInt($(this).val()) - parseInt($("#total").val());
			   if (kembalian > 0)
			   {
				$('#kembalian').val(kembalian);
			   }
			   else
			   {
				   $('#kembalian').val(0);
			   }
			   
			}
		});
		
		
		
		
		$(document).ready( function(e) {
		  $('#form_penjualan').submit(function(e) {
			  	e.preventDefault();
				$('.required').each(function(){
					if( $(this).val() == "" ){
					  alert('Please fill all the fields');

					  return false;
					}
				});
				e.preventDefault();
				
				var jmlh = "";
				var id_brg = "";
				var harga = ""
				var barang = ""
				
				$("#czContainer .jmlh").each(function(e){	
					  jmlh += this.value+",";
				});
				
				$("#czContainer .id_brg").each(function(e){	
					  id_brg += this.value+",";
				});
				
				$("#czContainer .harga").each(function(e){	
					  harga += $("#"+this.id).text()+";";
				});
				
				
				$("#czContainer .barang").each(function(e){	
					  barang += this.value+",";
				});
				
				jmlh = jmlh.substring(0, jmlh.length - 1);
				var jmlh_arr = jmlh.split(",");
				id_brg = id_brg.substring(0, id_brg.length - 1);
				var id_brg_arr = id_brg.split(",");
				harga = harga.substring(0, harga.length - 1);
				var harga_arr = harga.split(";");
				barang = barang.substring(0, barang.length - 1);
				var barang_arr = barang.split(",");
				
				var details = "";
				
				$.each(barang_arr, function (index, value) {
					details += barang_arr[index]+" @"+harga_arr[index].toString()+" dengan jumlah "+jmlh_arr[index]+" ;";
				});
				details = details.substring(0, details.length - 1);
				
					$.ajax({
						url: "http://localhost:8081/trans/save",
						type: "post",
					data: $("#form_penjualan").serialize()+"&barang="+id_brg+"&jmlh="+jmlh+"&detail="+details,
						success: function (response) {
						    $('#form_penjualan').trigger("reset");	
						   location.reload();
						}
					});
				
				return false;


			});
			document.getElementById("form_penjualan").addEventListener("submit", function(event){
			  event.preventDefault()
			});
			return false;
		})
		
		 document.getElementById("form_penjualan").addEventListener("submit", function(event){
		  event.preventDefault()
		  
		});
	
		
		$.ajax({
						url: "http://localhost:8081/trans/view",
						data : "",
						type: "get",
						"headers": {
							  "accept": "application/json",
							  "Access-Control-Allow-Origin":"*"
						  },
						dataType: "json",
						 crossDomain: true,
						success: function (response) {
						   $('#table-trans > tbody').html("");
						   var table = "";
						   
						   $.each(response, function( index, value ) {			
							table +=  "<tr><th>"+(index+1)+"</th><th style='width:40px'><a onclick='edit_trans("+value.id+")' class='fa fa-pencil' aria-hidden='true' style='margin-right:15px'></a><a onclick='delete_trans("+value.id+")' class='fa fa-trash' aria-hidden='true'></a></th><th>"+value.customer+"</th><th>"+value.sales+"</th><th>"+value.detail+"</th><th>"+numeral(value.total).format('0,0')+"</th><th>"+numeral(value.dibayar).format('0,0')+"</th><th>"+numeral(value.kembalian).format('0,0')+"</th></tr>";
						   });
						   $('#table-trans > tbody').html(table);
						}
					});
		
		
    </script>
@endsection