
<!DOCTYPE html>
<html>

<head>
    <title>AdminHome</title>
    <link rel="stylesheet" href="billing.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="waiter/js/jquery.min.js"></script>
    <script>
        document.getElementById('netamt').disabled = true;
        var sino = 0;
        var netamount = 0;
        function TableClear(){
            sino = 0;
            netamount = 0;
            $("#netamt").val(0);
            $("#rowscount").val(0);
            $("tbody").remove();
        }
        function TableCheck(){
            TableClear();
            if($("#kottable tbody").length>0){
                        
                    }
                    var idlen = $('#tableno').val();
                    if(idlen.length > 0)
                    {
                        // alert(idlen);
                        var form_data = new FormData();
                        form_data.append('tablequery',idlen);
                        var ajax_request = new XMLHttpRequest();
                        ajax_request.open('POST','ajax-table-kot.php')
                        ajax_request.send(form_data);
                        ajax_request.onreadystatechange = function()
                        {
                            
                            if(ajax_request.readyState == 4 && ajax_request.status == 200){
                                var response = JSON.parse(ajax_request.responseText);
                                let k = 0;
                                // alert(response.length);
                                while(k<response.length){
                                    
                                    let waiterid = response[k].waiterid;
                                    let itemid = response[k].itemid;
                                    let itemname = response[k].itemname;
                                    let itemqty = response[k].itemqty;
                                    let tablenumber = response[k].tablenumber;
                                    let itemprice = response[k].itemprice
                                    let amount = itemqty * itemprice;
                                    netamount += amount;
                                    $("#netamt").val(netamount);
                                    if ($("#kottable tbody").length == 0) {
                                        sino = 0;
                                        $("#kottable").append("<tbody></tbody>");
                                    }
                                    sino = sino + 1;
                                        $("#kottable tbody").append("<tr>" +
                                        "<td>" + sino + "<input type='hidden' name='Sino"+sino+"' value='"+sino+"'></td>" +
                                        "<td>" + waiterid + "<input type='hidden' name='WaiterId"+sino+"' value='"+waiterid+"'></td>" +
                                        "<td>" + tablenumber + "<input type='hidden' name='Table"+sino+"' value='"+tablenumber+"'></td>" +
                                        "<td>" + itemid + "<input type='hidden' name='ItemId"+sino+"' value='"+itemid+"'></td>" +
                                        "<td>" + itemname + "<input type='hidden' name='ItemName"+sino+"' value='"+itemname+"'></td>" +
                                        "<td>" + itemqty + "<input type='hidden' name='ItemQty"+sino+"' value='"+itemqty+"'></td>" +
                                        "<td>" + itemprice + "<input type='hidden' name='ItemPrice"+sino+"' value='"+itemprice+"'></td>" +
                                        "<td>" + amount + "<input type='hidden' name='Amount"+sino+"' value='"+amount+"'></td>" +
                                    "</tr>");
                                    $("#rowscount").val(sino);
                                    k++;
                                }
                                

                            }
                            else{
                                // alert("4 and 200 error");
                            }
                        }
                    }
        }
        function sendbill(){
            if($("#kottable tbody").length>0){
                return true;
            }
            else{
                alert("No table");
                return false;
            }
        }
    </script>
<body>
    <div class="outside-wrapper">
        <div class="navigation">
            <ul class="navi-ul"> 
                <li class="navi-list"><a class="navi-a" href="admin_home.php">HOME</a></li>
                <li class="navi-list"><a class="navi-a" href="add_waiter.php">ADD/EDIT WAITER</a></li>
                <li class="navi-list"><a class="navi-a" href="add_items.php">ADD/EDIT ITEMS</a></li>
                <li class="navi-list"><a class="navi-a active" href="#"  >BILLING</a></li>
            </ul>
        </div>
        <form  name="btnpay" action="ajax-bill.php" method="post" onsubmit="return sendbill();" >  
        <div class="main-box" style="background: #333;">   
        
            <div class="formcontainer" >
                
                    <div class="form-group" style="margin-top: 30px;">
                        <label for="tableno" class="input-label">TABLE NO</label>
                        <input type="text" class="input-control input-inline" name="tableno" id="tableno" autocomplete="off">
                        
                    </div>
                    
                    <div class="form-group" style="margin-top: 30px;">
                        <button type="button" class="btn button-28" id="btncheck" onclick="TableCheck();">Check</button>
                        <button type="submit" name="btnpay" class="btn button-28" id="btnpay" value="btnpay" >Pay</button>
                        <button type="reset" class="btn button-28 button-29" id="btncancel" onclick="TableClear();">Cancel</button>
                    </div>
                    <div class="form-group" style="margin-top: 15px;">
                        <label for="" class="label-amount">Total Amount : </label>
                        <input type="text" class="input-amount" name="netamt" id="netamt" value='0' >
                        <input type="hidden" name="rowscount" id="rowscount" value="0">
                    </div>
                
            </div>
            <div class="billcon2">
                <h2>Tables</h2>
                <div class="table-box" style="height: 450px; overflow: auto;">
                
                    <table id="kottable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <!-- <th>KOT</th> -->
                            <th>Waiter Id</th>
                            <th>Table No</th>
                            <th>Item Id</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                        
                    </table>
                   
                </div>
            </div>
            
        </div>
        </form>
    </div>
    <script>
        $("document").ready(function(){

            $("#tableno").keypress(function(event){
                
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    event.preventDefault();
                    // alert("SHaamik!");
                    TableCheck();
                }
            });
        });
        
    </script>
</body>
</head>

</html>