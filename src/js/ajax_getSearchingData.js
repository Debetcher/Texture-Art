$(document).ready(function() {

  $("#search-input").keyup(function() {

    $("#sb_creator").load("classes/User/getcreatordata.ajax.php", {
      inputValue: $('#search-input').val()
    });

    $("#sb_pack").load("classes/Pack/getpackdata.ajax.php", {
      inputValue: $('#search-input').val()
    });

  });


  //load pack invites



  $(document).on("click", ".request-accept", function(e) {

    $("#topbar-invite-bar").load("classes/PackInvite/getpidata.ajax.php", {
      inputValue: true,
      inputPI: e.target.dataset.id,
      inputUser: e.target.dataset.username

    });
  });

  $(document).on("click", ".request-reject", function(e) {

    $("#topbar-invite-bar").load("classes/PackInvite/getpidata.ajax.php", {
      inputValue: false,
      inputPI: e.target.dataset.id,
      inputUser: e.target.dataset.username

    });
  });



});
