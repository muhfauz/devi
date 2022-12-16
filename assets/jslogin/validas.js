
    $('#loginform').validate({
      rules:{
        username:{
            required:true,
            minlength:3
        }
      },
      messages:{
        username:{
          required:"Username harus diisi",
          minlength:"Minimal 3 karakter"
        }
      },

    })
