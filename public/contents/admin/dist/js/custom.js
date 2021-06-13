// =======================form validation create category==============================
  $(document).ready(function () {
  // form validation create users
  $('#userForm').validate({
    rules: {
      name: 'required',
      email: 'required',
      password:{
        required:true,
        minlength: 8
      },
      password_confirmation:{
        required:true,
        minlength: 8
      },
    },
    messages: {
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
    });

    // form validation create users
  $('#userEditForm').validate({
    rules: {
      name: 'required',
      email: 'required',
      password:{
        minlength: 8
      },
    },
    messages: {
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
    });


  // form validation create category
    $('#categoryForm').validate({
      rules: {
        name: 'required',
      },
      messages: {
        name:"The category name field is required.",
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

// form validation create tag
    $('#TagForm').validate({
      rules: {
        name: 'required',
      },
      messages: {
        name:"The tag name field is required.",
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

	// form validation create category
    $('#PostForm').validate({
		rules: {
		  title: 'required',
		  category: 'required',
		  image: 'required',
		  description: 'required',
		},
		messages: {
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
		  error.addClass('invalid-feedback');
		  element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
		  $(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
		  $(element).removeClass('is-invalid');
		}
	  });

 
  	// form validation Manage
    $('#manageForm').validate({
      rules: {
        name: 'required',
        copyright: 'required',
      },
      messages: {
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
      });
      
     
    });
//=======================Suucess error message==================
setTimeout(function() {
    $('.alertsuccess').slideUp(1000);
}, 5000);

setTimeout(function() {
    $('.alerterror').slideUp(1000);
}, 10000);

//Image Upload Script
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#upload_image')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
//bootstrap custom input image
$(document).ready(function () {
	bsCustomFileInput.init()
  });

//summaer note for blog description
  $('#summernote').summernote({
    placeholder: 'Blog description...',
    tabsize: 2,
    height: 200
  });
// //Modal code start
// $(document).ready(function(){
// 	$(document).on("click", "#softDelete", function () {
// 		 var deleteID = $(this).data('id');
// 		 $(".modal_card #modal_id").val( deleteID );
// 	});



