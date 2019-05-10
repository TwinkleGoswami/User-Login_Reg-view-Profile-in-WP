function  validate(groupname) {
    var groupName = jQuery("." + groupname);
    var isvalid = true;
    if(groupname != undefined && groupname.length > 0)
    {
        var allcontrols = jQuery(groupName).find(".check-valid");
        if(allcontrols.length > 0){
            jQuery(allcontrols).each(function (index,element) {
                if(jQuery(element)[0].tagName === "INPUT"){
                    if(jQuery(element)[0].type === "text"){
                        if(jQuery(element).parents(".form-group").find(".errorMessage").length > 0){
                            jQuery(element).parents(".form-group").find(".errorMessage").remove();
                        }
                        if(jQuery(element).val().trim() === "")
                        {
                            var errorMessage = jQuery(element).attr("errorMessage");
                            var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                            jQuery(element).parents(".form-group").append(html);
                            isvalid = false;
                            jQuery(element).on("keyup",function (value) {
                                if (jQuery(this).parents(".form-group").find(".errorMessage").length > 0){
                                    jQuery(this).parents(".form-group").find(".errorMessage").remove();
                                }
                                if(jQuery(this).val().trim() === "" ){
                                    var errorMessage = jQuery(this).attr("errorMessage");
                                    var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                                    jQuery(this).parents(".form-group").append(html);
                                }

                            });
                        }
                    }
                    if(jQuery(element)[0].type === "email"){

                        if(jQuery(element).parents(".form-group").find(".errorMessage").length > 0)
                        {
                            jQuery(element).parents(".form-group").find(".errorMessage").remove();
                        }
                        if(jQuery(element).val().trim() === "")
                        {
                            var errorMessage = jQuery(element).attr("errorMessage");
                            var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                            jQuery(element).parents(".form-group").append(html);
                            isvalid = false;

                            jQuery(element).on("keyup",function (value) {
                                if (jQuery(this).parents(".form-group").find(".errorMessage").length > 0){
                                    jQuery(this).parents(".form-group").find(".errorMessage").remove();
                                }
                                if(jQuery(this).val().trim() === "" ){
                                    var errorMessage = jQuery(this).attr("errorMessage");
                                    var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                                    jQuery(this).parents(".form-group").append(html);
                                }
                                if(jQuery(element).val() != ""){
                                    var reg =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                                    var email = jQuery(element).val();
                                    if(!(reg.test(email)))
                                    {
                                        var errorMessage = jQuery(element).attr("email-check");
                                        var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                                        jQuery(this).parents(".form-group").append(html);
                                    }
                                }
                            });
                        }
                        else if(jQuery(element).val() != ""){
                            var reg =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                            var email = jQuery(element).val();
                            if(!(reg.test(email)))
                            {
                                var errorMessage = jQuery(element).attr("email-check");
                                var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                                jQuery(this).parents(".form-group").append(html);
                                isvalid = false;

                            }
                        }
                    }
                    if(jQuery(element)[0].type === "password" ){

                        if(jQuery(element).parents(".form-group").find(".errorMessage").length > 0){
                            jQuery(element).parents(".form-group").find(".errorMessage").remove();
                        }
                        if(jQuery(element).val().trim() === "")
                        {
                            var errorMessage = jQuery(element).attr("errorMessage");
                            var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                            jQuery(element).parents(".form-group").append(html);
                            isvalid = false;
                            jQuery(element).on("keyup",function (value) {
                                if (jQuery(this).parents(".form-group").find(".errorMessage").length > 0){
                                    jQuery(this).parents(".form-group").find(".errorMessage").remove();
                                }
                                if(jQuery(this).val().trim() === "" ){
                                    var errorMessage = jQuery(this).attr("errorMessage");
                                    var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                                    jQuery(this).parents(".form-group").append(html);
                                }
                                // if(allcontrols[index + 1].value != ""){
                                //     if(jQuery(element).val() !== allcontrols[index + 1].value){
                                //
                                //         var errorMessage = jQuery(allcontrols[index + 1]).attr("check-password");
                                //         var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                                //         jQuery(element).parents(".form-group").append(html);
                                //     }
                                // }
                            });
                        }
                    }
                }
                else if (jQuery(element)[0].tagName === "SELECT")
                {
                    if(jQuery(element)[0].value == ""){

                        if(jQuery(element).parents(".form-group").find(".errorMessage").length > 0){
                            jQuery(element).parents(".form-group").find(".errorMessage").remove();
                        }
                        if(jQuery(element).val().trim() === "")
                        {
                            var errorMessage = jQuery(element).attr("errorMessage");
                            var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                            jQuery(element).parents(".form-group").append(html);
                            isvalid = false;
                            jQuery(element).on('change', function (value){
                                if (jQuery(this).parents(".form-group").find(".errorMessage").length > 0){
                                    jQuery(this).parents(".form-group").find(".errorMessage").remove();
                                }
                                if(jQuery(this).val().trim() === "" ){
                                    var errorMessage = jQuery(this).attr("errorMessage");
                                    var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                                    jQuery(this).parents(".form-group").append(html);
                                }
                            });
                        }
                    }
                }
                else if(jQuery(element)[0].tagName === "TEXTAREA")
                {
                    if(jQuery(element).parents(".form-group").find(".errorMessage").length > 0){
                        jQuery(element).parents(".form-group").find(".errorMessage").remove();
                    }
                    if(jQuery(element).val().trim() === "")
                    {
                        var errorMessage = jQuery(element).attr("errorMessage");
                        var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                        jQuery(element).parents(".form-group").append(html);
                        isvalid = false;
                        jQuery(element).on("keyup",function (value) {
                            if (jQuery(this).parents(".form-group").find(".errorMessage").length > 0){
                                jQuery(this).parents(".form-group").find(".errorMessage").remove();
                            }
                            if(jQuery(this).val().trim() === "" ){
                                var errorMessage = jQuery(this).attr("errorMessage");
                                var html = "<span class='errorMessage'>"+errorMessage+"</span>";
                                jQuery(this).parents(".form-group").append(html);
                            }
                        });
                    }
                }
            });
        }
    }
    return isvalid;
}