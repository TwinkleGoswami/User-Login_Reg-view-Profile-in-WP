jQuery(document).ready(function () {
    var today = new Date();
    jQuery("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        endDate: "today",
        maxDate: today,
        changeMonth: true,
        changeYear: true,
    }).on('changeDate', function () {
        $(this).datepicker('hide');
    });

    jQuery("#Newregister").click(function () {
        if(validate("validation_register"))
        {
            var firstname=jQuery('#first_name').val();
            var lastname=jQuery('#last_name').val();
            var dob=jQuery('#datepicker').val();
            var email=jQuery('#email').val();
            var password=jQuery('#password').val();
            var confirmpassword=jQuery('#password_confirmation').val();
            var address=jQuery('#address').val();
            var phno=jQuery('#phno').val();
            var status=jQuery('#status').val();
            var gender=jQuery('#gender').val();
            // var profile=jQuery('#file-upload').val();
            var profile = jQuery("#file-upload").prop("files")[0];
            var form_data = new FormData();
            form_data.append("file", profile);
            form_data.append("firstname", firstname);
            form_data.append("lastname", lastname);
            form_data.append("dob", dob);
            form_data.append("email", email);
            form_data.append("password", password);
            form_data.append("confirmpassword", confirmpassword);
            form_data.append("address", address);
            form_data.append("phno", phno);
            form_data.append("status", status);
            form_data.append("gender", gender);
            form_data.append("action", 'add_register');
            // console.log(frontend_ajax_object.ajaxurl);
            jQuery.ajax({
                    url: frontend_ajax_object.ajaxurl,
                    type: 'post',
                    data:form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        jQuery(".success-reg").show();
                        jQuery("#success-msg").text(response);
                        jQuery("form").trigger("reset");

                    }
                });
        }
    });
    jQuery("#login").click(function () {
        if(validate("validation_login"))
        {
            var firstname=jQuery('#firstname').val();
            var password=jQuery('#password').val();
            jQuery.ajax({
                url: frontend_ajax_object.ajaxurl,
                type: 'post',
                data:{
                    action:'add_login',
                    firstname:firstname,
                    password:password
                },
                success: function (data)
                {
                    var user=JSON.parse(data);
                    if (user.loggedin == true){
                        location.replace(frontend_ajax_object.redirecturl);
                        jQuery("form").trigger("reset");
                    }
                    else if (user.loggedin == false) {
                        jQuery('#unsuccess-msg').show();
                        jQuery('.error-msg').html(user.message);
                    }
                }
            });
        }
    });
    jQuery('.edit').on('click', function (e) {
        jQuery("#userModal").modal();
        var userId =jQuery(this).data("key");
        // console.log(userId);
        jQuery.ajax({
            url:frontend_ajax_object.ajaxurl,
            type:'post',
            data:{
                userId:userId,
                action:'fetchUserData'
            },
            success:function (response) {
                var user=JSON.parse(response);
                console.log(user);
                jQuery("#userid").val(user.UserId);
                jQuery("#firstname").val(user.first_name);
                jQuery("#lastname").val(user.last_name);
                jQuery("#datepicker").val(user._dob);
                jQuery("#email").val(user.user_email);
                jQuery("#address").val(user._address);
                jQuery("#phno").val(user._phone_no);
                jQuery("#status").val(user._maritial_status);
                jQuery("#gender").val(user._gender);
                jQuery("#userprofile").attr("src",user._profile);
            }
        });

    });
    jQuery("#updateEmp").click(function () {
       if(validate("userValidation"))
       {
           var userid=jQuery("#userid").val();
           var firstname=jQuery("#firstname").val();
           var lastname=jQuery("#lastname").val();
           var dob=jQuery("#datepicker").val();
           var email=jQuery("#email").val();
           var address=jQuery("#address").val();
           var phno=jQuery("#phno").val();
           var status=jQuery("#status").val();
           var gender=jQuery("#gender").val();
           var profile=jQuery("#userprofile").attr("src");
           // var uploadImg = jQuery("#file-upload").prop("files")[0];
           var form_data = new FormData();
           form_data.append("userid", userid);
           form_data.append("profile", profile);
           form_data.append("firstname", firstname);
           form_data.append("lastname", lastname);
           form_data.append("dob", dob);
           form_data.append("email", email);
           form_data.append("address", address);
           form_data.append("phno", phno);
           form_data.append("status", status);
           form_data.append("gender", gender);
           form_data.append("action", 'update_register_user');

           jQuery.ajax({
               url:frontend_ajax_object.ajaxurl,
               type:'post',
               data:form_data,
               contentType: false,
               processData: false,
               success:function (response) {
                   console.log(response);
                   jQuery("form").trigger("reset");
                   window.location.reload();
               }
           });
       }
    });
    jQuery(".profilemodal").click(function () {
       jQuery("#profileModal").modal();
        var userId =jQuery(this).data("key");
        jQuery("#updateuser").click(function () {

            var profile = jQuery("#file-upload").prop("files")[0];
            var form_data = new FormData();
            form_data.append("userid", userId);
            form_data.append("profile", profile);
            form_data.append("action", 'upload_profile');
            jQuery.ajax({
                url:frontend_ajax_object.ajaxurl,
                type:'post',
                data:form_data,
                contentType: false,
                processData: false,
                success:function (response) {
                    alert(response);
                    jQuery("form").trigger("reset");
                    window.location.reload();
                }
            });

        });


    });

});