$(function(){
    $("#main-contact-form").on("submit", function(e){
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();



        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var message = $("#message").val();


        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


        if (name == "" || name.length < 5){

            toastr.error('please enter a name with 5 character','error',{
                closeButton:true,
                progressBar:true,
            });

        }else if(email == ""){

            toastr.error('the email field is required','error',{
                closeButton:true,
                progressBar:true,
            });
        }else if(email.indexOf("@", 0) < 0 ){

            toastr.error('please enter valid email address','error',{
                closeButton:true,
                progressBar:true,
            });
        }else if(email.indexOf(".", 0) < 0 ){

            toastr.error('please enter valid email address','error',{
                closeButton:true,
                progressBar:true,
            });
        }else if(subject == "" || subject.length < 10){

            toastr.error('please enter your subject min 10 character','error',{
                closeButton:true,
                progressBar:true,
            });
        }else if(message == ""){

            toastr.error('message is required','error',{
                closeButton:true,
                progressBar:true,
            });
        }else {

            $.ajax({

                url: url,
                data: data,
                type: type,
                dataType: "JSON",

                success: function (data) {
                    if (data == "success") {
                        toastr.success('Your message successfully send :)', 'success', {
                            closeButton: true,
                            progressBar: true,
                        });

                        $("#name").val("");
                        $("#email").val("");
                        $("#subject").val("");
                        $("#message").val("");

                    } else {
                        toastr.error('something is missing :)', 'error', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }
                },


            });

        }

    });












});//end function