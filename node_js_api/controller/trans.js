/*
 * Controller for Add / Update / Delete of Profile table
 */
 
const path = require('path');	 
var async = require('async');
var flash = require('express-flash-messages')
 // Single Profile View
// Profile list Export

exports.list_view = function(req, res){
  req.getConnection(function(err, connection){
    connection.query('select id,sales,customer,detail,barang,jmlh,dibayar,total,kembalian from trans_brg order by id DESC', function (error, results, fields) {
	  return res.send(results);
    });
  });
};

exports.get_brg = function(req, res){
var key= req.query.term;
var get_id = "";

if(req.query.id)
{
	get_id = "and id not in("+req.query.id+")";
}
req.getConnection(function(err, connection){
    connection.query("SELECT * FROM brg where name like '%"+key+"%' "+get_id, function (error, results, fields) {
      if (error) throw error;
	  
	  return res.send(results);
    });
  });
};

exports.del = function(req, res){
  var id = req.params.id;
   req.getConnection(function(err, connection){
    connection.query("DELETE FROM trans_brg WHERE id = ? ", [id], function(err, rows){
		return res.send();
    });
  });
};

exports.get_all = function(req, res){
  var id = req.params.id;
   req.getConnection(function(err, connection){
    connection.query("select * from trans_brg WHERE id = ? ", [id], function(err, rows){
		return res.send(rows[0]);
    });
  });
};

exports.get_brg_id = function(req, res){
var key= req.query.brg;
req.getConnection(function(err, connection){
    connection.query("select name,harga FROM brg WHERE id in("+req.query.brg+") ", function (error, results, fields) {
 	  return res.send(results);
    });
  });
};

exports.get_brg_by_id = function(req, res){
req.getConnection(function(err, connection){
    connection.query("select name,harga FROM brg WHERE id = "+req.params.id, function (error, results, fields) {
 	  return res.send(results[0]);
    });
  });
};

exports.save = function(req, res){
  var input = JSON.parse(JSON.stringify(req.body));
 
  //return console.log(input);
  req.getConnection(function(err, connection){
	  
  var query = connection.query("select * from trans_brg WHERE id = "+input.id, function(err, rows){
	  
    var data = {
      sales: input.sales,
	  customer 	: input.customer 	,
	  barang : input.barang,
	  jmlh  : input.jmlh,
	  dibayar : input.dibayar,
	  total   : input.total,
	  kembalian : input.kembalian,
	  detail : input.detail
	  
    };	  
  //return console.log(rows);
  if(rows)
	  connection.query("UPDATE trans_brg set ? WHERE id = ?", [data, input.id], function(err, row){
      if(err)
        console.log("Error in Updating : %s", err);
	  else
		 res.send("");  
	  
    });
  else	
    req.getConnection(function(err, connection){
    var query = connection.query("INSERT INTO trans_brg set ?", data, function(err, rows, fields){
        if(err)
		  console.log("Error in Saving : %s", err);
	    else
		  res.send("");      
    });
  });
})})
};