<?php
include('./header_footer/header.php');
if(isset($_SESSION['is_admin'==1])){
    header('Location:order_list.php');
}
?>
<div class="container mt-5 mb-5">
    <?php
    if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'true') {
        echo '<div class="alert alert-success">' . $_REQUEST['message'] . '</div>';
    }

    if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'false') {
        echo '<div class="alert alert-danger">' .$_REQUEST['message'] . '</div>';
    }
    ?>
    <div class="row">
        <div class="col-12 text-center">
            <h4>Reports</h4>
            <br>
        </div>
        <?php ?>
        <div class="col-12" id="tempdiv" style="display: none;">
            <div class="card" id="prt">
                <div class="card-header text-center">
                    <span id="frhead"></span>
                </div>
                <div class="card-body" >
                    <div class="col-12" id="cont">
                        <table class="table" style="display: none;" id="tb1">
                            <tr>
                                <th>Total No Of Users</th>
                                <td><span id="users"></span></td>
                            </tr>
                            <tr>
                                <th>Total No Of Items</th>
                                <td><span id="products"></span></td>
                            </tr>
                            <tr>
                                <th>Total Price</th>
                                <td><span id="total"></span> &#8377; </td>
                            </tr>
                            <tr>
                                <th>Total Orders</th>
                                <td><span id="orders"></span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>

                        <table class="table" style="display: none;" id="tb2">
                            <tr>
                                <th>Total No Of Users</th>
                                <td><span id="st"></span></td>
                            </tr>
                            <tr>
                                <th>Total No Of Cources</th>
                                <td><span id="cr"></span></td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                <td><span id="tt"></span> &#8377; </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12" style="font-size: 12px;" id="det">
                        
                    </div>
                    <div class="col-12 text-center" id="btns">
                        <a href="./manage-reports.php" class="btn btn-outline-primary">Back</a>
                        <!-- <button onclick="printDiv();" class="btn btn-outline-info">print</button> -->
                    </div>
                </div>
               
            </div>
            
        </div>
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card" style="" id="formdiv">
                <div class="card-body">
                    <form action="" id="form">
                        <div class="form-group">
                            <Label>Select Report Type</Label>
                            <select name=""  class="form-control" id="type">
                                <option value="0">None</option>
                                <option value="1">Cakes</option>
                                <option value="2">Class Booking</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <Label>Select Report Period</Label>
                            <select name=""  class="form-control" id="period">
                                <option value="0">None</option>
                                <option value="1">Monthly</option>
                                <option value="2">Yearly</option>
                            </select>
                        </div>
                        
                        <div class="form-group" style="display: none;" id="month">
                            <Label>Select Month</Label>
                            <select name="" class="form-control"  id="monthv">
                                <option value="0">None</option>
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                        </div>
                        
                        <div class="form-group" style="display: none;" id="year">
                            <Label>Select Year</Label>
                            <select name=""  class="form-control"  id="yearv">
                                <option value="0">None</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </form>
                    
                    <div class="col-12 text-center">
                        <button class="btn btn-primary" id="res">Submit</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
<?php
include('./header_footer/footer.php');
?>
<script>
    var yr
    var mn
    var type
    var t1
    var prd
    var monthList = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
     $('#res').click(function(){
        type = $('#type').val()
        t1 = type
        yr = $('#yearv').val()
        mn = $('#monthv').val()
        prd = $('#period').val()
        console.log(type,yr,mn,prd)
       if(type==0){
           alert('Please Select Report Type..');
           return   
       }else if(type==1){
           if(prd==0){
            alert('Please Select Report Period..');
           return
           }else{
               if(prd==1){
                if(mn==0){
                alert('Please Select A Month..');
                return
               }else {
                   getReport(type, mn, prd)
               }
               }else{
                if(yr==0){
                alert('Please Select A Year..');
                return
               }else {
                   getReport(type, yr, prd)
               } 
               }
           }
       }else{
        if(prd==0){
            alert('Please Select Report Period..');
           return
           }else{
               if(prd==1){
                if(mn==0){
                alert('Please Select A Month..');
                return
               }else {
                   getReport(type, mn, prd)
               }
               }else{
                if(yr==0){
                alert('Please Select A Year..');
                return
               }else {
                   getReport(type, yr, prd)
               }
               }
           }
       }
     })

    function getReport(t, val, prd) {
            var table
            var qr
            var qr1
            if (t == 1) {
                table = "cakes"
                if (prd == 1) {
                    qr = "select count(distinct(user_id)) as users,count(distinct(item_id)) as products, truncate(sum(amount),2) as total,\
                            count(order_id) as orders from order_details o where status = 'DELIVERED' and  month(date) =" + val
                    qr1 =" select item_id,id.name ,\
                            (select count(order_id) from order_details od where od.item_id=id.item_id and month(date)="+val+"  and status='DELIVERED') as orders,\
                            (select sum(amount) from order_details od where od.item_id=id.item_id and month(date)="+val+" and status='DELIVERED') as total\
                            from item_details id where id.item_id  in (select od2.item_id from order_details od2 where month(od2.date)="+val+" and od2.status='DELIVERED') "
                    
                } else {
                    qr1 = " select item_id,id.name ,\
                            (select count(order_id) from order_details od where od.item_id=id.item_id and year(date)="+val+"  and status='DELIVERED') as orders,\
                            (select sum(amount) from order_details od where od.item_id=id.item_id and year(date)="+val+" and status='DELIVERED') as total\
                            from item_details id where id.item_id  in (select od2.item_id from order_details od2 where year(od2.date)="+val+" and od2.status='DELIVERED') " 

                    qr = "select count(distinct(user_id)) as users,count(distinct(item_id)) as products, truncate(sum(amount),2) as total,\
                            count(order_id) as orders from order_details o where status = 'DELIVERED' and  year(date) =" + val
                }
            }
            else {
                table = "class"
                if (prd == 1) {
                    qr1 = "select c2.cource ,c2.start_date ,c2.end_date ,\
                            (select sum(c.amount) from class_booking cb left join cources c \
                            on c.class_id=cb.class_id and cb.status='REGISTERED' and cb.class_id=c2.class_id) as amount,\
                            (select count(distinct (user_id)) from class_booking cb where cb.class_id = c2.class_id and cb.status ='REGISTERED') as users\
                            from cources c2 where month(c2.start_date )="+val
                    qr = " select count(distinct(c.class_id)) as courses, count(distinct(cb.user_id)) as students, sum(c.amount) as total \
                            from cources c left join class_booking cb  on c.class_id=cb.class_id\
                            where month(c.start_date) ="+val+" and cb.status ='REGISTERED'"
                     } else {
                    qr1 =  "select c2.cource ,c2.start_date ,c2.end_date ,\
                            (select sum(c.amount) from class_booking cb left join cources c \
                            on c.class_id=cb.class_id and cb.status='REGISTERED' and cb.class_id=c2.class_id) as amount,\
                            (select count(distinct (user_id)) from class_booking cb where cb.class_id = c2.class_id and cb.status ='REGISTERED') as users\
                            from cources c2 where year(c2.start_date )="+val

                    qr = " select count(distinct(c.class_id)) as courses, count(distinct(cb.user_id)) as students, sum(c.amount) as total \
                            from cources c left join class_booking cb  on c.class_id=cb.class_id\
                            where year(c.start_date) ="+val+" and cb.status ='REGISTERED'"
                     }
            }
            console.log(qr, type, qr1)
            $.ajax({
            url:'ajax_reports.php',
            type:'post',
            data:{qry:qr, qry1:qr1, type:t},
            dataType:'json',
            success:function(res){
                console.log(res)
                var content = ''
                // if()
                $('#form').trigger("reset");
                if(type==1){
                    const dat = res.tot
                    var start = `
              <table class="table"> 
                <thead class="thead-light">
                            <tr class="active">
                                <th>SL NO.</th>
                                <th>Name</th>
                                <th>Total Orders</th>
                                <th>Total Amount</th>
                            </tr></thead>
              `
              var end = "</table>"
                    for (let i = 0; i < dat.length; i++) {
                        content += "\
                        <tr>\
                                <td>"+(i+1)+"</td>\
                                <td>"+dat[i].name+"</td>\
                                <td>"+dat[i].orders+"</td>\
                                <td>"+dat[i].total+"  &#8377;</td>\
                            </tr>\
                        "
                    } 
                    var footy = "<tr>\
                                <td></td>\
                                <td></td>\
                                <td></td>\
                                <td>"+res.total+"  &#8377;</td>\
                            </tr>"

                    if(prd==1){
                $("#frhead").html('Report Of Product Sales for The Month '+monthList[mn-1])
              }else{
                $("#frhead").html('Report Of Product Sales for The Year '+yr)
              }
              $("#users").html(res.users||0)
              $("#products").html(res.products||0)
              $("#orders").html(res.orders||0)
              $("#total").html(res.total||0)
              $("#formdiv").hide()
              $("#tempdiv").show()
              $("#tb1").show()
              $("#tb2").hide()
              $("#det").html(start+content+footy+end)
                }
                if(type==2){
                    const dat = res.tot
                    var start = `
              <table class="table">
                <thead class="thead-light">
                            <tr class="active">
                                <th>SL NO.</th>
                                <th>Course Name</th>
                                <th>Amount</th>
                                <th>No of Students</th>
                                <th>Course Period</th>
                            </tr></thead>
              `
              for (let i = 0; i < dat.length; i++) {
                        content += "\
                        <tr>\
                                <td>"+(i+1)+"</td>\
                                <td>"+dat[i].cource+"</td>\
                                <td>"+dat[i].total+"  &#8377;</td>\
                                <td>"+dat[i].users+"</td>\
                                <td>"+dat[i].start+" TO "+dat[i].end+"</td>\
                            </tr>\
                        "
                    } 
                    var footy = "<tr>\
                                <td></td>\
                                <td></td>\
                                <td></td>\
                                <td>"+res.tt+"  &#8377;</td>\
                            </tr>"
              var end = "</table>"
                    if(prd==1){
                        $("#frhead").html('Report Of Class Booking for The Month '+monthList[mn-1])
                    }else{
                        $("#frhead").html('Report Of Class Booking for The Year '+yr)
                    }
                    $("#st").html(res.st||0)
              $("#cr").html(res.cr||0)
              $("#tt").html(res.tt||0)
              $("#formdiv").hide()
              $("#tempdiv").show()
              $("#tb1").hide()
              $("#tb2").show()
              $("#det").html(start+content+footy+end)

                }
             
              },
            error:function(err){
                console.log(err)
            }
          });

        }

    $('#period').change(function(){
    if($('#period').val()==0){
        $('#month').prop('selectedIndex',0).hide()
        $('#year').prop('selectedIndex',0).hide()
    }else if($('#period').val()==1){
        $('#year').prop('selectedIndex',0).hide()
        $('#month').show()
    }else{
        $('#month').prop('selectedIndex',0).hide()
        $('#year').show()
    }
		// $.ajax({
        //     url:'ajax_duplicate_check.php',
        //     type:'post',
        //     data:{type:"PET",val:$('#breed').val()},
        //     dataType:'json',
        //     success:function(res){
        //       if(res.valid){
        //         $("#breed").addClass("is-invalid").focus();
        //         $("#passwordHelp").css("display","block");
        //         is_valid = false
        //       }
        //       else{
        //         $("#breed").removeClass("is-invalid");
        //         $("#passwordHelp").css("display","none");
        //         is_valid = true
        //       }
        //     }
        //   });
	});
    function printDiv() 
{
    $("#btns").hide()
    var headContent = document.getElementsByTagName('head')[0].innerHTML;
  var divToPrint=document.getElementById('prt');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><head>'+headContent+'</head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);
  $("#btns").show()

}
</script>