$(document).ready(function(){
  $('#emailform').validate(
    {
      rules:{
        nama_email:{
          required: true,
					minlength: 5
        }
      },
      messages: {
        nama_email: {
						required: "Masukkan Username",
						minlength: "Username minimal 2 karakter"
					},

      }
    }
  )
})
