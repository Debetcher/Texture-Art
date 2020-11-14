$('form').parsley();


//register

$("#btnRegister").click(function() {
  $('#registerForm').parsley().whenValidate({
    group: "first"
  }).done(function() {

    $(".showfirst").css({
      "display":"none"
    });
    $(".showlast").css({
      "display":"block"
    });

  });

});


$('input[name="username"]').parsley({
  minlength: 3,
  maxlength: 15,
  regexUsername: "/^[a-zA-Z0-9 ]{3,20}$/",
  trigger:"keyup"

});


$('input[name="description"]').parsley({
  minlength: 3,
  maxlength: 15,
  regexUsername: "/^[a-zA-Z0-9 ]{3,20}$/"

});

$('input[name="email"]').parsley({
  type: "email"

});

$('input[name="password"]').parsley({
  minlength: 6,
  maxlength: 20,
  regexPassword: "/^(?=.*[a-z])(?=.*[A-Z]).{6,20}$/"

});

$('input[name="packname"]').parsley({
  minlength: 3,
  maxlength: 15,
  regexPackname: "/^[ A-Za-z0-9_@.#&+()]{3,30}$/"

});

$('input[name="packname-ig"]').parsley({
  minlength: 3,
  maxlength: 15,
  regexPackname: "/^[ A-Za-z0-9_@.#&+()]{3,30}$/"

});




window.Parsley
  .addValidator('regexUsername', {
    // string | number | integer | date | regexp | boolean
    requirementType: 'regexp',

    // validateString | validateDate | validateMultiple
    validateString (value, requirement) {
      return requirement.test(value);
    },

    messages: {
      en: 'The username must not contain any special characters'
    }
  });

  window.Parsley
    .addValidator('regexPassword', {
      // string | number | integer | date | regexp | boolean
      requirementType: 'regexp',

      // validateString | validateDate | validateMultiple
      validateString (value, requirement) {
        return requirement.test(value);
      },

      messages: {
        en: 'The passwords must contain 1 lowercase and 1 uppercase'
      }
    });

    window.Parsley
      .addValidator('regexPackname', {
        // string | number | integer | date | regexp | boolean
        requirementType: 'regexp',

        // validateString | validateDate | validateMultiple
        validateString (value, requirement) {
          return requirement.test(value);
        },

        messages: {
          en: 'The packname must not contain those characters'
        }
      });



    window.Parsley
      .addValidator('usernameAvailable', {

        validateString: function(value) {
          return $.ajax({
            url: "./classes/User/checkUserLogin.ajax.php",
            method: "POST",
            data:{usernameAvailable:value},
            dataType:"json",
            success:function(data){
              return true
            }
          });

        },



        messages: {
          en: 'Username is not available'
        }
      });

      window.Parsley
        .addValidator('emailAvailable', {

          validateString: function(value) {
            return $.ajax({
              url: "./classes/User/checkUserLogin.ajax.php",
              method: "POST",
              data:{emailAvailable:value},
              dataType:"json",
              success:function(data){
                return true
              }
            });
          },



          messages: {
            en: 'Email is not available'
          }
        });

    window.Parsley
      .addValidator('usernameExist', {

        validateString: function(value) {
          return $.ajax({
            url: "./classes/User/checkUserLogin.ajax.php",
            method: "POST",
            data:{usernameExist:value},
            dataType:"json",
            success:function(data){
              return true
            }
          });
        },

        messages: {
          en: 'Username does not exist'
        }
      });



      window.Parsley
        .addValidator('login', {

          validateString: function(value) {
            var username = $('input[name="username"]').val(),
                password = $('input[name="password"]').val();



                return $.ajax({
                  url: "./classes/User/checkUserLogin.ajax.php",
                  method: "POST",
                  data:{login_username:username, login_password:password},
                  dataType:"json",
                  success:function(data){
                    return true
                  }
                });

          },



          messages: {
            en: 'Password or username are wrong!'
          }
        });

window.Parsley
  .addValidator('checkActivation', {

    validateString: function(value) {
      var token = $('input[name="aktivation"]').val(),
          input = $('input[name="token"]').val();



          if (token == input) {
            return true
          }else {
            return false
          }

    },



    messages: {
      en: 'Token is not correct!'
    }
          });
