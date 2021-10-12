$(function(){
    $('#upload').change(function(){
        const file = $(this)[0].files[0]
        const fileReader = new FileReader()
        fileReader.onloadend = function(){
            $('#img').attr('src', fileReader.result)
        }
        fileReader.readAsDataURL(file)
    })
})

jQuery(document).ready(function($) {
    $('#show_password').click(function(e){
        e.preventDefault();
        if($('#floatingPassword').attr('type') == 'password'){
            $('#floatingPassword').attr('type', 'text');
            $('#show_password').attr('class', 'fa fa-eye');
        }else{
            $('#floatingPassword').attr('type', 'password');
            $('#show_password').attr('class', 'fa fa-eye-slash');
        }
    });
});
