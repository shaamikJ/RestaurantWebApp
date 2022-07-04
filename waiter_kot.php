<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiter Order</title>
    <link rel="stylesheet" href="hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="hotel2.css?=<?php echo time(); ?>">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script>
        var sino = 0;
        function getItemval(kk){
                var ans = kk.getAttribute('value');
                var sha_id = kk.getAttribute('data-itemid');
                var sha_price = kk.getAttribute('data-price');
                console.log(ans);
                console.log(sha_id);
                console.log(sha_price);
                $("#itemname").val(ans);
                $("#itemid").val(sha_id);
                $("#itemprice").val(sha_price);
                $("ul.list-group").remove();
                $("#quantity").focus();
            }
        function clearTable(){
            $("tbody").remove();
            $("ul.list-group").remove();
            sino = 0;
        }
        function deleterow(event){
                console.log("Delete");
                // sino = sino - 1;         To reduce the no. of rows when deleted the row!!!
                // $("#rowscount").val(sino);
                $(event).closest("tr").remove();
                
            }
            function sendkot(){
                if($('tbody').length){
                    if($('tbody tr.javahar').length){
                        return true;
                    }
                    else{
                        alert("There is no tr");
                        return false;
                    }
                }
                else{
                    alert("There is no tbody");
                    return false;
                }
                
            }
    </script>
</head>
<body>
<div class="outside-out">
        <div class="nav">
            <ul>
                <!-- <li><a href="waiter_home.php">HOME</a></li> -->
                <li><a href="#" class="active">ORDER</a></li>
            </ul>
        </div>
        <div class="maincontent">
            <div class="maincontent-trans">
               
                    <form method="post" action="send-kot.php" onsubmit="return sendkot();" name="kot" class="formcontainer form-newcol">
                        <h2>Order</h2>
                        <div class="form-group">
                            <label for="tableno">Table No</label>:
                            <input type="text" name="tableno" id="tableno" placeholder="Enter Table no" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="itemid">Item Id</label>:
                            <input type="text" name="itemid" id="itemid" placeholder="Enter Item id" autocomplete="off">
                            <input type="hidden" name="itemprice" id="itemprice" autocomplete="off">
                            
                        </div>
                        <div class="form-group" style="display: static; ">
                            
                                <label for="itemname">Item Name</label>:
                                <input type="text" style="font-family: 'Mulish',sans-serif; text-transform: uppercase;" name="itemname" id="itemname"  placeholder="Enter Item name" autocomplete="off">
                            
                            <span id="search_result" style="position: relative; "></span>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>:
                            <input type="text" name="quantity" id="quantity" placeholder="Enter Quantity" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn button-28" name="add" id="addbtn">ADD</button>
                            <button type="submit" class="btn button-28 button-30" name="order" id="orderbtn">Order</button>
                            <button type="reset" class="btn button-28 button-29" name="cancel" onclick="clearTable();">CANCEL</button>
                            <input type="hidden" id="rowscount" name="rowscount" value="0">
                            <input type="hidden" id="rowsdel" name="rowsdel" value="0">
                        </div>
                       
                        <div class="tablebox">
                        <table id="itemtable" style='width:100% !important;'>
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Table No</th>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            
                        </thead>
                        
                        </table>
                        </form>
                </div>
                
            
            </div>
        </div>
    </div>
    <script>
        $("document").ready(function(){
            $(document).mouseup(function (e) {
                if ($(e.target).closest("#search_result").length=== 0) {
                    $("ul.list-group").remove();
                }
            });
            
           $("#itemname").keyup(function(){
            var query = $("#itemname").val();
            if(query.length > 0){
                    
                    var form_data = new FormData();
                    form_data.append('query',query);
                    var ajax_request = new XMLHttpRequest();
                    ajax_request.open('POST','ajax-item-search.php')
                    ajax_request.send(form_data);
                    ajax_request.onreadystatechange = function()
                    {
                        
                        if(ajax_request.readyState == 4 && ajax_request.status == 200){
                            var response = JSON.parse(ajax_request.responseText);
                            var html = '<ul class="list-group">';
                            if(response.length > 0){
                                for(var count=0;count<response.length; count++){
                                    html += '<li class="list-group-item" data-itemid="'+response[count].item_id+'" data-price="'+response[count].price+'" value="'+response[count].orgitem+'" onclick="getItemval(this);">'+response[count].item+'</li>';
                                }

                            }
                            else{
                                html += '<a href="#" >No Data Found</a>';
                            }
                            html += '</ul>';
                            document.getElementById("search_result").innerHTML = html;
                        }
                        else{
                            
                        }
                    }
                }
                else{
                    
                    document.getElementById("search_result").innerHTML = "";
                }
           });
                
            
            $("#tableno").keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    $('#itemid').focus();
                    event.preventDefault();
                        return false;
                }
            });
            $("#itemid").keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    event.preventDefault();
                    var idlen = $('#itemid').val();
                    if(idlen.length > 0)
                    {
                        // alert(idlen);
                        var form_data2 = new FormData();
                        form_data2.append('query2',idlen);
                        var ajax_request = new XMLHttpRequest();
                        ajax_request.open('POST','ajax-itemid-search.php')
                        ajax_request.send(form_data2);
                        ajax_request.onreadystatechange = function()
                        {
                            
                            if(ajax_request.readyState == 4 && ajax_request.status == 200){
                                var response = JSON.parse(ajax_request.responseText);
                                let k = 0;
                                if(response.length > 0){
                                    let kitemname = response[k].itemname;
                                    let kitemprice = response[k].price;
                                    $('#itemname').val(kitemname);
                                    $('#itemprice').val(kitemprice);
                                    $('#quantity').focus();

                                }
                                else{
                                    $('#itemname').focus();
                                }

                            }
                            else{
                                
                            }
                        }

                    }
                    else{
                        $('#itemname').focus();
                        return false;
                    }
                }
            });
            $("#itemname").keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    $('#quantity').focus();
                    event.preventDefault();
                        return false;
                }
            });
            $("#quantity").keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    var table = $('#tableno').val();
                    var itemid = $('#itemid').val();
                    var itemname = $('#itemname').val();
                    var qty = $('#quantity').val();
                    if(table ===""){
                        alert("Enter table no");
                        $("#tableno").focus();
                        return false;
                    }
                    else if(itemid===""){
                        alert("Enter id");
                        $("#itemid").focus();
                        return false;
                    }
                    else if(itemname===""){
                        alert("Enter Item");
                        $("#itemname").focus();
                        return false;
                    }
                    else if(qty===""){
                        alert("Enter Quantity");
                        return false;
                    }
                    else{
                        ItemAdd(table,itemid,itemname,qty);
                        $("#itemid").focus();
                        event.preventDefault();
                        return false;
                    }
                }
                
            });
            $("#addbtn").click(function(){
                
                    let table = $('#tableno').val();
                    let itemid = $('#itemid').val();
                    let itemname = $('#itemname').val();
                    let qty = $('#quantity').val();
                    if(table ===""){
                        alert("Enter table no");
                        $("#tableno").focus();
                        return;
                    }
                    else if(itemid===""){
                        alert("Enter id");
                        $('#itemid').focus();
                        return;
                    }
                    else if(itemname===""){
                        alert("Enter Item");
                        $('#itemname').focus();
                        return;
                    }
                    else if(qty===""){
                        alert("Enter Quantity");
                        
                        return;
                    }
                    else{
                        ItemAdd(table,itemid,itemname,qty);
                        
                        $("#tableno").focus();
                    }
                
            });
            function rowcount(x){
                $("#rowscount").val(x);
                
            }
            function ItemAdd(table,itemid,itemname,qty){
                var itemprice = $("#itemprice").val();
                if ($("#itemtable tbody").length == 0) {
                    sino = 0;
                    $("#itemtable").append("<tbody></tbody>");
                }
                sino = sino + 1;
                    $("#itemtable tbody").append("<tr class='javahar'>" +
                    "<td>" + sino + "<input type='hidden' name='Sino"+sino+"' value='"+sino+"'></td>" +
                    "<td>" + table + "<input type='hidden' name='Table"+sino+"' value='"+table+"'>"+"<input type='hidden' name='ItemId"+sino+"' value='"+itemid+"'></td>" +
                    "<td>" + itemname + "<input type='hidden' name='ItemName"+sino+"' value='"+itemname+"'></td>" +
                    "<td>" + qty + "<input type='hidden' name='ItemQty"+sino+"' value='"+qty+"'></td>" +
                    "<td>" + itemprice + "<input type='hidden' name='ItemPrice"+sino+"' value='"+itemprice+"'></td>" +
                    "<td>" + "<button type='button' class='tablebtn btn-delete' id='delrow' onclick='deleterow(this)' ><i class='fa fa-trash fa-lg'></i></button>" + "</td>" +
                   "</tr>");
                   
                   rowcount(sino);
                    
                formClear();
                
            }
            function formClear(){
                $('#itemid').val("");
                $('#itemname').val("");
                $('#quantity').val("");
                $('#itemid').focus();
            }
            
            
        });
        
    </script>

</body>
</html>
