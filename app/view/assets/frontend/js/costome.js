function contact() {
    var name = jQuery('#name').val();
    var email = jQuery('#email').val();
    var msg = jQuery('#msg').val();

    jQuery.ajax({
        url : 'http://localhost/mvc/index.php?url=index/contactsub',
        type:'get',
        data : 'name='+name+'email='+email+'msg='+msg,
        success: function(response){
            
        }
    });

    //alert(email);
}