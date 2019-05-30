$(function(){
    $("#order-form").on("submit", function(e){
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();



        var name = $("#name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var address = $("#address").val();
        var payments = $("#payments").val();
        var message = $("#message").val();

        if(name == ""){

            $("#errorname").text("Please enter your name !");
            $("#errorname").fadeOut(5000);

        }else if(phone == ""){

            $("#errorphone").text("Please enter your phone number !");
            $("#errorphone").fadeOut(5000);
        }else if(email == ""){

            $("#erroremail").text("Please enter your email address !");
            $("#erroremail").fadeOut(5000);

        }else if(email.indexOf("@", 0) < 0 ){

            $("#erroremail").text("Please enter your valid email address !");
            $("#erroremail").fadeOut(5000);

        }else if(email.indexOf(".", 0) < 0 ){

            $("#erroremail").text("Please enter your valid email address !");
            $("#erroremail").fadeOut(5000);
        }else if(address == ""){

            $("#erroraddress").text("Please enter your shipping address !");
            $("#erroraddress").fadeOut(5000);
        }else if(payments.selectedIndex < 1){

            $("#errorpayments").text("Please select a payment method !");
            $("#errorpayments").fadeOut(5000);
        }else if(message == ""){

            $("#errormsg").text("Please enter your message !");
            $("#errormsg").fadeOut(5000);
        }else{


            $.ajax({

                url: url,
                data: data,
                type: type,
                dataType: "JSON",

                success: function(data){

                    if(data == "success"){

                        $("#name").val("");
                        $("#email").val("");
                        $("#phone").val("");
                        $("#address").val("");
                        $("#payment").val("");
                        $("#transunction_id").val("");
                        $("#message").val("");

                        toastr.success('Your order has taken successfully :)','success',{
                            closeButton:true,
                            progressBar:true,
                        });


                    }else if(data == "duplicate_order"){

                        $("#name").val("");
                        $("#email").val("");
                        $("#phone").val("");
                        $("#address").val("");
                        $("#payment").val("");
                        $("#transunction_id").val("");
                        $("#message").val("");

                        toastr.error('already one order taken from you.and its in progress.after complete this order you can place new order:)','error',{
                            closeButton:true,
                            progressBar:true,
                        });

                    }else{
                        toastr.error('Your order not completed','error',{
                            closeButton:true,
                            progressBar:true,
                        });

                        $("#name").val("");
                        $("#email").val("");
                        $("#phone").val("");
                        $("#address").val("");
                        $("#payment").val("");
                        $("#transunction_id").val("");
                        $("#message").val("");
                    }

                },


            });


        }






    });



});//end function