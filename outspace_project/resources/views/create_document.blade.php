@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Create Document</span>
                </h1>

            </div>
            <div class="row">
                <div>
                    <div class="demo-form-wrapper">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lc_no">LC NO</label>
                                    <input id="lc_no" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="lc_ammendment_no">LC Ammendment No</label>
                                    <input id="lc_ammendment_no" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="document_number">Document Number</label>
                                    <input id = "document_number" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="document_part">Document Part</label>
                                    <input id = "document_part" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="packing">Packing</label>
                                    <input id = "packing" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="document_date">Document Date</label>
                                    <input id = "document_date" class="form-control" type="text" data-provide="datepicker" data-date-today-highlight="true" required>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="hs_code_number">H.S. Code Number</label>
                                    <input id="hs_code_number" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="imp_auth_no">Import Authorization No.</label>
                                    <input id="imp_auth_no" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="insurance_no">Insurance No.</label>
                                    <input id="insurance_no" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="irc_no">IRC No.</label>
                                    <input id = "irc_no" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="truck_no">Truck No.</label>
                                    <input id = "truck_no" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="shipping_marks">Shipping Marks</label>
                                    <input id = "shipping_marks" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="payment_terms">Payment Terms</label>
                                    <input id = "payment_terms" class="form-control" type="text" required>
                                </div>
                            </div>
                            <button id ="populate_goods">Populate Goods</button>
                            <div id="PItablediv">
                                <table id="PITable" border="1" width="100%">
                                    <tr>
                                        <td>SL</td>
                                        <td>PI</td>
                                        <td>Description</td>
                                        <td>Quantity</td>
                                        <td>Unit Price</td>
                                        <td>Total Price</td>
                                        <td>Net weight</td>
                                        <td>Gross weight</td>
                                        <td>Delete?</td>
                                        <td>Add Rows?</td>
                                    </tr>
                                    <tr>
                                        <td><input size=25 type="text" name="myinput" class="sl" id="sl" value="1"/></td>
                                        <td><input size=25 type="text" name="myinput" id="pi"/></td>
                                        <td><input size=25 type="text" name="myinput" id="description"/></td>
                                        <td><input size=25 type="text" name="myinput" id="quantity"/></td>
                                        <td><input size=25 type="text" name="myinput" id = "unitprice"></td>
                                        <td><input size=25 type="text" name="myinput" id = "totalprice"></td>
                                        <td><input size=25 type="text" name="myinput" id = "netweight"></td>
                                        <td><input size=25 type="text" name="myinput" class = "grossweight" id = "grossweight"></td>
                                        <td><input type="button" id="delPOIbutton" value="Delete"
                                                   onclick="deleteRow(this)"/></td>
                                        <td><input type="button" id="addmorePOIbutton" value="Add More POIs"
                                                   onclick="insRow()"/></td>
                                    </tr>

                                </table>
                            </div>
                        <div class="md-form-group">
                            <label class="control-label" for="select_a_bank">Select a Bank</label>
                            <div>
                                <select class = "md-form-control" id="pdfPage" name = "pdfPage">
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value = "1">First Page</option>
                                    <option value = "2">Bill of Exchange</option>
                                    <option value="3">Truck Receipt</option>
                                    <option value="4">Commercial Invoice</option>
                                    <option value="5">Beneficiary Certificate</option>
                                    <option value = "6">Certificate of Origin</option>
                                    <option value="7">Delivery Chalan</option>
                                    <option value = "8">Packing Detail</option>
                                    <option value = "9">All Pages</option>
                                </select>
                                <label class="md-control-label"></label>
                            </div>
                        </div>
                            <button id="btnConfirm" class="btn btn-primary btn-block col-sm-6" type="submit">Confirm</button>
                            <button class="btn btn-primary btn-block col-sm-6" type="submit">Reset</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
@section('script')
    <script>
    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;
        alert(i);
        document.getElementById('PITable').deleteRow(i);
    }
    function getrow(row) {
        var i = row.parentNode.parentNode.rowIndex;
        alert(i);
    }

        $("#populate_goods").click(function(){
            var lc_number = document.getElementById("lc_no").value;
            var ammendment_no = document.getElementById('lc_ammendment_no').value;

            $.ajax({

                type: "GET",
                cache: false,
                url: "{{ route('populate_goods') }}",
                data: {lc_no: lc_number, ammendment_no: ammendment_no},
                success: function (data) {
                    if(data.length>0){
                        var i;
                        for(i = 0; i<data.length; i++){
                            if(i==0){
                                document.getElementById('pi').value = data[i].pi_id;
                                document.getElementById('description').value = data[i].description;
                                document.getElementById('quantity').value = data[i].quantity;
                                document.getElementById('unitprice').value = data[i].unit_price;
                                var quantity = document.getElementById('quantity').value;
                                var unitprice = document.getElementById('unitprice').value;
                                var totalprice = quantity*unitprice;
                                document.getElementById('totalprice').value = totalprice;
                            }
                            else{

                            }
                            insRow(data,i);
                        }
                        document.getElementById('PITable').deleteRow(1);
                    }
                    else{
                        alert("No goods Found");
                    }

                }
            });
        });

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
        var inpPi = new_row.cells[1].getElementsByTagName('input')[0];
        var inpPi_id = inpPi.id + len;
        inpPi.id  = inpPi_id;
        inpPi.value = data[i].pi_id;

        var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
        var inp2_id = inp2.id + len;
        inp2.id  = inp2_id;
        inp2.value = data[i].description;
        var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
        var inp3_id = inp3.id+len;
        inp3.id  = inp3_id;
        var quantity = data[i].quantity;
        inp3.value = quantity;
        var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
        var inp4_id = inp4.id+len;
        inp4.id  = inp4_id;
        var unitprice = data[i].unit_price;
        inp4.value = unitprice;
        var inp5 = new_row.cells[5].getElementsByTagName('input')[0];
        var inp5_id = inp5.id + len;
        inp5.id = inp5_id;
        inp5.value = quantity*unitprice;
        var inp6 = new_row.cells[6].getElementsByTagName('input')[0];
        var inp6_id = inp6.id + len;
        inp6.id = inp6_id;
        var inp7 = new_row.cells[7].getElementsByTagName('input')[0];
        inp7.id+= len;
       x.appendChild(new_row);
    }

    $("#PITable").on( 'click', '.grossweight', function() {
        var rowindex = $(this).closest('tr').find(".sl").val();
        var netweight = document.getElementById("netweight"+rowindex).value;
       var grossweight = netweight*1.024;
       document.getElementById("grossweight"+rowindex).value = grossweight;

    });
    $('#btnConfirm').click(function () {
        var TableData = new Array();
        var lc_no = document.getElementById('lc_no').value;
        var document_part = document.getElementById('document_part').value;
        var lc_ammendment_no = document.getElementById('lc_ammendment_no').value;
        var document_number = document.getElementById('document_number').value;
        var packing = document.getElementById('packing').value;
        var document_date = new Date(document.getElementById('document_date').value);
        var doc_date = (document_date.getFullYear() + '-' + document_date.getMonth() + '-' + document_date.getDate());
        var hs_code_number = document.getElementById('hs_code_number').value;
        var imp_auth_no = document.getElementById('imp_auth_no').value;
        var insurance_no = document.getElementById('insurance_no').value;
        var irc_no = document.getElementById('irc_no').value;
        var truck_no = document.getElementById('truck_no').value;
        var shipping_marks = document.getElementById('shipping_marks').value;
        var payment_terms = document.getElementById('payment_terms').value;
        //var e = document.getElementById("pagePdf");
        //var pagePdf = e.options[e.selectedIndex].value;
        var e = document.getElementById("pdfPage");
        var page = e.options[e.selectedIndex].value;
        $('#PITable tr').each(function (row, tr) {

            if (row > 0) {
                var rowIndex = row - 1;
                TableData[rowIndex] = {
                    "sl": $(tr).find("td:eq(0) input[type='text']").val()
                    ,"pi": $(tr).find("td:eq(1) input[type='text']").val()
                    , "description": $(tr).find("td:eq(2) input[type='text']").val()
                    , "quantity": $(tr).find("td:eq(3) input[type='text']").val()
                    , "unit_price": $(tr).find("td:eq(4) input[type='text']").val()
                    , "net_weight": $(tr).find("td:eq(6) input[type='text']").val()
                    , "gross_weight": $(tr).find("td:eq(7) input[type='text']").val()

                };

                // Another test
            }
        });
        $.ajax({
            type: "GET",
            cache: false,
            url: "{{ route('create_doc') }}",
            data: {
                rowdata: TableData,doc_part_no: document_part,
                lc_no: lc_no,
                lc_ammendment_no: lc_ammendment_no,
                document_number: document_number,
                //pagePdf: pagePdf,
                packing: packing,
                document_date: doc_date,
                hs: hs_code_number,
                imp_auth_no: imp_auth_no,
                insurance_no: insurance_no,
                irc_no: irc_no,
                truck_no: truck_no,
                shipping_marks: shipping_marks,
                payment_terms: payment_terms
            },
            success: function (data) {

               window.location = "http://localhost:8000/generate_doc_pdf?pdf_values=" + data+"&page="+page;
            },
            error: function () {
                alert("Error Occured");
            }
        });



    });
        $("#document_number").on("click",function () {
            var lc_no = document.getElementById('lc_no').value;
            var ammend_no = document.getElementById('lc_ammendment_no').value;
          $.ajax({
              type: "GET",
              cache: false,
              data: {lc_no: lc_no, ammend_no: ammend_no},
              url: "{{ route('get_doc_number') }}",
              success: function (data) {
                  document.getElementById("document_number").value = data[0];
                  document.getElementById("document_part").value = data[1];
              }
          })
        });

</script>
@endsection
