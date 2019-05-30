$(function(){

    //add to cart item

    $("#addtocartproduct").on("submit", function(e){
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();

        $.ajax({

            url: url,
            data: data,
            type: type,
            dataType: "JSON",

            success: function(data){

                if(data == "success"){
                    toastr.success('product added to your cart','success',{
                        closeButton:true,
                        progressBar:true,
                    });
                }else if(data == "error"){
                    toastr.info('product already added to your cart','info',{
                        closeButton:true,
                        progressBar:true,
                    });
                }

            },


        });


    });


    // Delete Data
    $(document).on("click", "#deletecartitem", function(arg){
        arg.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            data: {id:id},
            type: "GET",
            dataType: "JSON",
            success(response){

                toastr.success('product remove from your cart','success',{
                    closeButton:true,
                    progressBar:true,
                });

                return getCartItem();


            }
        })

    })


    //get all cart item
    function getCartItem(){
        var url = $("#getallcartitem").data("url");

        $.ajax({
            url: url,
            type: "get",
            dataType: "HTMl",
            success: function(response){
                $("#showAllcartitem").html(response);
            }
        })
    }





});//end main function