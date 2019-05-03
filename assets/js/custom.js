function getProduct(client_id)
	{
		jQuery.ajax({
			type: "POST",
			url: baseurl + "index.php/Invoice/getProductByClientID",
			data: {client_id: client_id},
			dataType:'json',
			success:function(result){
                    var jsonData = result;
                    var trHTML = '';
					 trHTML =  "<option value=''>--Select Product--</option>";
				        $.each(jsonData.productData, function (i, item) {
				            trHTML += '<option value='+ item.product_id +'>' + item.product_description + '</option>';
				        });
				        $('#product_id').html(trHTML);

             }
		});
	}

	$("#form").submit(function(event){
            event.preventDefault();

            $.ajax({
                    url: baseurl + "index.php/Invoice/generateHTML",
                    type:'POST',
                    dataType:'json',
                    data:$(this).serialize(),
                    success:function(result){
                    var jsonData = result;

                    var trHTML = '';

					var trHTML =  "<div class='container'><div class='row'><div class='col-md-12'><div class='panel panel-default'><div class='panel-body'><h3 class='panel-title'><strong>Order summary</strong></h3><div class='table-responsive'><table  class='table table-condensed'><tr><td><strong>Invoice Number</strong></td><td class='text-center'><strong>Invoice Date</strong></td><td class='text-center'><strong>Product</strong></td><td class='text-center'><strong>Quantity</strong></td><td class='text-center'><strong>Price</strong></td><td class='text-right'><strong>Totals</strong></td></tr>";
				        $.each(jsonData.invoiceData, function (i, item) {
				            trHTML += '<tr><td>' + item.invoice_num + '</td><td class="text-center">' + item.invoice_date + '</td>' + '<td class="text-center">' + item.product_description + '</td><td class="text-center">' + item.qty + '</td>' + '</td><td class="text-center">' + item.price + '</td>' + '</td><td class="text-right">' + item.qty*item.price + '</td></tr>';
				        });
				         trHTML += "</table></div></div></div></div></div></div>";
				        $('#records_table').html(trHTML);

                    }

            });
     });