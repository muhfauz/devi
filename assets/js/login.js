$(document).ready(function(){
  $('#loginform').validate(
    {
      rules:{
        username:{
          required: true,
					minlength: 5
        }
      },
      messages: {
        username: {
						required: "Masukkan Username",
						minlength: "Username minimal 2 karakter"
					},

      }
    }
  )
})
