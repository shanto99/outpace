@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Make an Advance DO</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <div class="md-form-group">
                            <label class="control-label" for="select_a_bank">Select a Bank</label>
                            <div>
                                <select class = "md-form-control" id="select_pi" name = "select_pi">
                                    <option disabled selected value> -- select an option -- </option>
                                    @foreach($pi as $p)
                                        <option value = "{{ $p->pi_id }}">{{ $p->pi_id }}</option>
                                        @endforeach
                                </select>
                                <label class="md-control-label"></label>
                            </div>
                        </div>
                        <div class="md-form-group">
                            <label for="do_id">DO ID</label>
                            <input id="do_id" name="do_id" class="md-form-control" type="text">
                            <label class="md-control-label"></label>
                        </div>
                        <div id="PItablediv">
                            <table id="PITable" border = "1" style="margin-left: -300px; margin-bottom: 10px;width: 100% ">
                                <thead>
                                <td><h5>Select</h5></td>
                                <td><h5>Description</h5></td>
                                <td><h5>Quantity</h5></td>
                                <td><h5>Unit Price</h5></td>
                                <td><h5>Total Price</h5></td>
                                <td><h5>Delete?</h5></td>
                                <td><h5>Add Rows?</h5></td>
                                </thead>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><input size=25 type="text" name="myinput" id = "description" class="description"/></td>
                                    <td><input size=25 type="text" name="myinput" id="quantity"/></td>
                                    <td><input size=25 type="text" name="myinput" class = "unit_price" id = "unit_price"></td>
                                    <td><input size=25 type="text" name="myinput" class = "total_price" id = "totalprice"></td>
                                    <td><input type="button" id="delPOIbutton" value="Delete"
                                               onclick="deleteRow(this)"/></td>
                                    <td><input type="button" id="addmorePOIbutton" value="Add More POIs"
                                               onclick="createRow()"/></td>
                                </tr>
                            </table>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit" id="save_do">Request</button>
                        <button class="btn btn-primary btn-block" type="submit">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    var pi;
    var order_no;
    $("#do_id").focus(function(){
        var e = document.getElementById("select_pi");
        var pi = e.options[e.selectedIndex].value;
       order_no =  document.getElementById("do_id").value = 'OSML/Ad.DO/'+pi;
    });
    $( function() {
        $("#select_pi").change(function(){
            var e = document.getElementById("select_pi");
            pi = e.options[e.selectedIndex].value;
            $.ajax({
                type: "GET",
                cache: false,
                url: "{{ route('populate_goods_pi') }}",
                data: {pi_no: pi},
                success: function (data) {
                    if(data.constructor !== Array){
                        alert(data);
                    }
                    else{
                        if(data.length>0){
                            var i;
                            for(i = 0; i<data.length; i++){

                                if(i==0){
                                    document.getElementById('description').value = data[i].description;
                                    document.getElementById('quantity').value = data[i].quantity;
                                    document.getElementById('unit_price').value = data[i].unit_price;
                                    var quantity = document.getElementById('quantity').value;
                                    var unitprice = document.getElementById('unit_price').value;
                                    var totalprice = quantity*unitprice;
                                    document.getElementById('totalprice').value = totalprice;
                                }
                                else{

                                }
                                insRow(data,i);
                            }
                            document.getElementById('PITable').deleteRow(1);
                        }
                    }


                }
            });
        });

    } );
    function insRow(data,i) {
        var x = document.getElementById('PITable');
        var new_row = x.rows[1].cloneNode(true);
        var len = x.rows.length;
        //new_row.cells[0].innerHTML = len;
        var inp1 = new_row.cells[0].getElementsByTagName('input')[0];
        inp1.id += len;
        if(len == 2){
            inp1.value = 1;
        }
        else{
            var slLen = len-1
            inp1.value = slLen;
        }

        len = len-1;


        var inp2 = new_row.cells[1].getElementsByTagName('input')[0];
        var inp2_id = inp2.id + len;
        inp2.id  = inp2_id;
        inp2.value = data[i].description;
        var inp3 = new_row.cells[2].getElementsByTagName('input')[0];
        var inp3_id = inp3.id+len;
        inp3.id  = inp3_id;
        var quantity = data[i].quantity;
        inp3.value = quantity;
        var inp4 = new_row.cells[3].getElementsByTagName('input')[0];
        var inp4_id = inp4.id+len;
        inp4.id  = inp4_id;
        var unitprice = data[i].unit_price;
        inp4.value = unitprice;
        var inp5 = new_row.cells[4].getElementsByTagName('input')[0];
        var inp5_id = inp5.id + len;
        inp5.id = inp5_id;
        inp5.value = quantity*unitprice;
        var inp6 = new_row.cells[5].getElementsByTagName('input')[0];
        var inp6_id = inp6.id + len;
        inp6.id = inp6_id;
        var inp7 = new_row.cells[6].getElementsByTagName('input')[0];
        inp7.id+= len;
        x.appendChild(new_row);
    }


    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;
        alert(i);
        document.getElementById('PITable').deleteRow(i);
    }

    function createRow() {
        var x = document.getElementById('PITable');
        var new_row = x.rows[1].cloneNode(true);
        var len = x.rows.length;
        //new_row.cells[0].innerHTML = len;
        var inp1 = new_row.cells[0].getElementsByTagName('input')[0];
        inp1.id += '';
        inp1.value = len;
        var inp2 = new_row.cells[1].getElementsByTagName('input')[0];
        inp2.id += '';
        inp2.class = 'description';
        inp2.value = '';
        var inp3 = new_row.cells[2].getElementsByTagName('input')[0];
        inp3.id += '';
        inp3.value = '';
        $(inp2).on('focus', function () {
            $(this).autocomplete({
                source: availableTags,
                minLength: 2
            })
        });
        x.appendChild(new_row);
    }

    $('#save_do').click(function () {
        var TableData = new Array();
                var rowIndex = 0;
        var request = 0;
        $('#PITable tr').each(function (row, tr) {

            if (row > 0) {
                var rowIndex = row - 1;
                var row = $(this);
                if (row.find('input[type="checkbox"]').is(':checked')){
                    request = 1;

                }
                TableData[rowIndex] = {
                     "description": $(tr).find("td:eq(1) input[type='text']").val()
                    , "quantity": $(tr).find("td:eq(2) input[type='text']").val()
                    , "unit_price": $(tr).find("td:eq(3) input[type='text']").val()
                    , "total_price": $(tr).find("td:eq(4) input[type='text']").val()
                    , "requested": request

                }


                // Another test
            }
            request = 0;
        });
        $.ajax({
            type: "GET",
            cache: false,
            url: "{{ route('do_goods') }}",
            data: {
                rowdata: TableData,
                pi_id: pi,
                order_no: order_no
            },
            success: function (data) {

                alert(data);
            },
            error: function () {
                alert("Error Occured");
            }
        });

    });

</script>
@endsection