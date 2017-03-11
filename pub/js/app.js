
$("document").ready(function(){
    
    $(".form-log").on('submit',function(){
            
            
               var password = $.md5($('input:password[name=password]').val());
               var username = $('input:text[name=username]').val();
               
                $.ajax({
                    type: 'post',
                    url: '/stp/login/log',
                    data: {username:username, password:password},

                    success: function(data) {
                        dat=JSON.parse(data);
                        
                        if(dat.msg == "Correct") {
                           window.location.href = dat.redir; 
                        }
                        
                        else {
                            $("#mens").removeClass();
                            $("#mens").addClass(dat.class);
                            $("#mens").html(dat.msg);
                        }
                            
                    }

                });

                return false;

           });
           
           $(".form-signup").on('submit',function(){
         
               var password = $.md5($('input:password[name=password]').val());
               var username = $('input:text[name=username]').val();
               var email = $('input:text[name=email]').val();
               
                $.ajax({
                    type: 'post',
                    url: '/stp/signup/sign',
                    data: {username:username, password:password, email:email},

                    success: function(data) {

                        dat=JSON.parse(data);
                        
                        if(dat.msg == "Correct") {
                           window.location.href = dat.redir; 
                        }
                        
                        else{
                            $("#mens").removeClass();
                            $("#mens").addClass(dat.class);
                            $("#mens").html(dat.msg);
                        }
                            
                    }

                });

                return false;

           });
        
    });
