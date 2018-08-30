jQuery(document).ready(function($){
    //Branch option changes dynamically depending on Bank
    $('#bank').change(function(){
        var e = document.getElementById("bank");
        var bank = e.options[e.selectedIndex].value;
        if(bank == "add_bank"){
            document.getElementById('bank_name').readOnly = false;
            document.getElementById('branch_name').readOnly = false;
            $("#address").val('');
            $("#bank_name").val('');
            $("#branch_name").val('');
            $("#swift").val('');
            $("#admin_name").val('');
            $("#admin_designation").val('');
        }
        $.get("http://localhost:8000/bankurl",
            { option: $(this).val() },
            function(data) {

                var item = $('#branch');
                item.empty();
                item.append("<option disabled selected value> -- select an option -- </option>")
                item.append("<option value='new_branch'>" + "Add A New Branch" + "</option>");
                $.each(data, function(key, value) {
                    item.append("<option value='"+ value +"'>" + value + "</option>");

                });


            });
    });
    //Input fields for a Bank are loaded depending
    $('#branch').change(function(){
        /*$.get("http://localhost:8000/branchurl",
            { option: $(this).val() },
            function(data) {
                var bank_name = $('#bank_name');
                bank_name.empty();
                var branch_name = $('#branch_name');
                branch_name.empty();
                var address = $('#address');
                address.empty();
                var admin_name = $('#admin_name');
                admin_name.empty();
                var admin_designation = $('#admin_designation');
                admin_designation.empty();
                $.each(data, function(key, value) {

                    $('#address').val(value);
                    //$('input[name=address]').val(value);

                });

            });*/
        document.getElementById('bank_name').readOnly = true;
        document.getElementById('branch_name').readOnly = true;
        var e = document.getElementById("branch");
        var branch = e.options[e.selectedIndex].value;
        if(branch == "new_branch"){
            var e = document.getElementById("bank");
            var bank = e.options[e.selectedIndex].value;
            document.getElementById('branch_name').readOnly = false;
            $("#address").val('');
            $("#bank_name").val(bank);
            $("#branch_name").val('');
            $("#swift").val('');
            $("#admin_name").val('');
            $("#admin_designation").val('');
        }
        else {
            $.ajax({

                type: "GET",
                cache: false,
                url : "http://localhost:8000/branchurl",
                data: { sem : branch },
                success: function(data) {
                    for (var i in data) {
                        $("#bank_name").val(data[i].bank_name);
                        $("#branch_name").val(data[i].bank_branch)
                        $('#address').val(data[i].address);

                        $('#admin_name').val(data[i].admin_name);
                        $('#admin_designation').val(data[i].designation);
                        $('#swift').val(data[i].swift);
                        /*alert(data[i].bank_id);
                         alert(data[i].address);*/

                    }
                }
            })
        }
           
    });
    //Getting the information of a BUYER
    $('#select_buyer').change(function(){
        
        var e = document.getElementById("select_buyer");
        var buyer_id = e.options[e.selectedIndex].value;
        document.getElementById('buyer_name').readOnly = true;
        if(buyer_id == "add_buyer"){
            document.getElementById('buyer_name').readOnly = false;
            $("#buyer_id").val('');
            $("#buyer_name").val('');
            $("#office_address").val('');
            $("#factory_address").val('');
        }
        else {
            $.ajax({

                type: "GET",
                cache: false,
                url : "http://localhost:8000/get_buyer",
                data: { sem : buyer_id },
                success: function(data) {
                    for (var i in data) {
                        $("#buyer_id").val(data[i].b_id);
                        $("#office_address").val(data[i].office_address);
                        $("#buyer_name").val(data[i].buyer_name);
                        $('#factory_address').val(data[i].factory_address);
                    }
                }
            })
        }

    });
    $('#do_no').change(function () {
        var e = document.getElementById("do_no");
        var delivery_order = e.options[e.selectedIndex].value;
        $("#count_name").empty();
        $.ajax({
            type: "GET",
            cache: false,
            url: "http://localhost:8000/get_pi_associated_do",
            data: { delivery_order_no: delivery_order },
            success: function(data){
                var item = $('#do_pi');
                item.empty();
                item.append("<option disabled selected value> -- select a PI -- </option>");
                for(var i in data){
                    item.append("<option value='"+ data[i].pi_id +"'>" + data[i].pi_id + "</option>");
                }
            }
        })
    });
  $('#do_pi').change(function () {
      var pi_dropdown = document.getElementById("do_pi");
      var do_dropdown = document.getElementById("do_no");
      var do_id = do_dropdown.options[do_dropdown.selectedIndex].value;
      var pi = pi_dropdown.options[pi_dropdown.selectedIndex].value;
      $.ajax({
          type: "GET",
          cache: false,
          url: "http://localhost:8000/get_do_goods",
          data: {do_id: do_id,pi_id:pi},
          success: function(data){
              var item = $("#count_name");
              item.empty();
              item.append("<option disabled selected value> -- select a Count -- </option>");
              for(var i in data){
                  item.append("<option value='"+ data[i].description +"'>"+ data[i].description +"</option>>");
              }
          }
      })

  });
    $("#count_name").change(function () {
        var pi_dropdown = document.getElementById("do_pi");
        var do_dropdown = document.getElementById("do_no");
        var do_id = do_dropdown.options[do_dropdown.selectedIndex].value;
        var pi = pi_dropdown.options[pi_dropdown.selectedIndex].value;
        var count = document.getElementById("count_name").value;
        $.ajax({
            type: "GET",
            cache: false,
            url: "http://localhost:8000/get_unit_price",
            data: {do_id: do_id,pi_id:pi,count:count},
            success: function(data){
                document.getElementById("unit_price").value = data;
            }
        })  
    });
    $("#do_number").change(function () {
        var do_number_field = document.getElementById("do_number");
        var do_number_value = do_number_field.options[do_number_field.selectedIndex].value;
        $.ajax({
            type: "GET",
            cache: false,
            data: {do_number: do_number_value},
            url: "http://localhost:8000/get_delivered_pi",
            success: function (data) {
               alert(JSON.stringify(data));
              var item = $("#do_pi_no");
                    item.empty();
                    item.append("<option disabled selected value >Select a PI</option>")
                    for(var i in data){
                     item.append("<option value='"+data[i].pi_id+"'>"+ data[i].pi_id +"</option>");
                    }
            }
        });
    });
    $("#do_pi_no").change(function () {
        var do_number_field = document.getElementById("do_number");
        var do_pi_no_field = document.getElementById("do_pi_no");
        var do_number_value = do_number_field.options[do_number_field.selectedIndex].value;
        var do_pi_no_value = do_pi_no_field.options[do_pi_no_field.selectedIndex].value;
        $.ajax({
            type: "GET",
            cache: false,
            data: {do_number_value: do_number_value,do_pi_no_value: do_pi_no_value},
            url: "http://localhost:8000/get_delivered_product",
            success: function (data) {
               var item = $("#delivered_count");
                item.empty();
                item.append("<option disabled selected value > ---Select a Count-----</option>")
                for(var i in data){
                    item.append("<option value='"+data[i].count+"'>"+ data[i].count +"</option>");
                }
            }
        })

    });
   $("#delivered_count").change(function () {
       var do_number_field = document.getElementById("do_number");
       var do_pi_no_field = document.getElementById("do_pi_no");
       var delivered_count = document.getElementById("delivered_count");
       var do_number_value = do_number_field.options[do_number_field.selectedIndex].value;
       var do_pi_no_value = do_pi_no_field.options[do_pi_no_field.selectedIndex].value;
       var delivered_count_name = delivered_count.options[delivered_count.selectedIndex].value;
       $.ajax({
           type: "GET",
           cache: false,
           data: {do_no: do_number_value,pi_no: do_pi_no_value,count_name: delivered_count_name},
           url: "http://localhost:8000/get_delivered_unit_price",
           success: function (data) {
               alert(data);
               document.getElementById("unit_price").value = data;
           }
       })
   });
    $("#replace_buyer").change(function () {
        var e = document.getElementById("replace_buyer");
        var replace_buyer = e.options[e.selectedIndex].value;
        $.ajax({
           type: "GET",
            cache: false,
            data: { replace_buyer: replace_buyer },
            url: "http://localhost:8000/replace_buyer_lc",
            success: function (data) {
                var item = $("#replacement_lc");
                item.empty();
                item.append("<option disabled selected value > ---Select LC-----</option>")
                for(var i in data){
                    item.append("<option value='"+data[i].lc_id+"'>"+ data[i].lc_id +"</option>");
                }
            }

        });
    });
    $("#replacement_lc").change(function () {
        var e = document.getElementById("replacement_lc");
        var selected_lc = e.options[e.selectedIndex].value;
        $.ajax({
            type: "GET",
            cache: false,
            data: {selected_lc:selected_lc},
            url: "http://localhost:8000/get_my_pi",
            success: function (data) {
                var item = $("#replacement_pi");
                item.empty();
                item.append("<option disabled selected value> -- select a PI -- </option>")
                for(var i in data){
                    item.append("<option value='"+data[i].pi_id+"'>"+ data[i].pi_id +"</option>");
                }
            }
        })
    });
    $("#select_doc").change(function () {
        var e = document.getElementById("select_doc");
        var selected_doc = e.options[e.selectedIndex].value;
        $.ajax({
            type: "GET",
            cache: false,
            data: {selected_doc: selected_doc},
            url: "http://localhost:8000/get_short_payment",
            success: function (data) {
                document.getElementById("short_payment").value = data;
            }
        })

    });

});
