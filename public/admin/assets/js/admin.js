
        $(document).ready(function(){

        	//remember me

        	$("#txtName").keyup(function(){
         	var userName = ($('#txtName').val()).trim();


                 $.ajax({
                        url : '/admin/remember',
                        type : 'POST',
                       dataType : 'json',
                        data : {
                            aName : userName,
                        },
                        success : function(result){
                            $.each(result,function(){
                                 
                                var html = ' ';
                                html += result.password;
                                if ( html != ' ') {
                                    $('#password').val(html);
                                }
                                
                            })
                        },

                        error : function(request,errorType,errorMessage){
                            alert(' Error : ' +errorType + ' with message ' + errorMessage);
                        }
            	});
    });
        });
