$(document).ready(function(){
    $(window).on('load',function(){
        $('#mainheader nav ul li').on('click',function(){
            $('#mainheader nav ul li').removeClass('active');
            $(this).addClass('active');
            console.log($(this));
        });
    
    });
    
    $('span.send').on('click',function(e){
        e.stopPropagation();
        var name = $('input[name="name"]');
        var email = $('input[name="email"]');
        var subject = $('input[name="subject"]');
        var message = $('textarea');

        var data = {"name": name.val(),"email":email.val(),"subject":subject.val(),"message":message.val()};

        var mailSend = $.ajax({
            method: "POST",
            data: data,
            url: "mail",
            dataType: "json",
            beforeSend: function(){
                $("span.send").html("Sending please wait...").addClass("sending");
            },
            success: function(data){
                console.log(data);
                var $errmessage = $(".responseMessage");
                if (data.notConfirmed) {
                    $errmessage.removeClass("success");
                    $errmessage.html("fill all the fields").addClass("error");
                }
                else if (data.sent) {
                    $errmessage.removeClass("error");
                    $errmessage.html(data.message).addClass("success");
                }
            },
            error: function(error){
                console.log(error.responseText);
            },
            complete: function(){
                $("span.send").html("Send").removeClass("sending");	
            }

        });

    });
});