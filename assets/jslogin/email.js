
  // $.validator.setDefaults( {
  //   submitHandler: function () {
  //     alert( "submitted!" );
  //   }
  // } );

  $( document ).ready( function () {
    $( "#emailjs" ).validate( {
      rules: {
        firstname: "required",
        lastname: "required",
        nama_email: {
          required: true,
          minlength: 5
        },
        password_email: {
          required: true,
          minlength: 5
        },
        confirm_password: {
          required: true,
          minlength: 5,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true
        },
        agree: "required"
      },
      messages: {
        firstname: "Please enter your firstname",
        lastname: "Please enter your lastname",
        nama_email: {
          required: "Username harus diisi",
          minlength: "Panjang username minimal 5 karakter"
        },
        password_email: {
          required: "Password Harus Diisi",
          minlength: "Panjang password minimal 5 karakter"
        },
        confirm_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long",
          equalTo: "Please enter the same password as above"
        },
        email: "Please enter a valid email address",
        agree: "Please accept our policy"
      },
      errorElement: "em",
      errorPlacement: function ( error, element ) {
        // Add the `invalid-feedback` class to the error element
        error.addClass( "invalid-feedback" );

        if ( element.prop( "type" ) === "checkbox" ) {
          error.insertAfter( element.next( "label" ) );
        } else {
          error.insertAfter( element );
        }
      },
      highlight: function ( element, errorClass, validClass ) {
        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
      },
      unhighlight: function (element, errorClass, validClass) {
        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
      }
    } );

  } );
