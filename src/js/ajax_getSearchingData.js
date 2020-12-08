let toggleSearchingBarStatus = false;

$(document).ready(function() {

  $("#search-input").keyup(function() {

    toggleSearchingBarStatus = true;
    $(".searching-bar").css("visibility", "visible");


    $("#sb_creator").load("classes/User/getcreatordata.ajax.php", {
      inputValue: $('#search-input').val()
    });

    $("#sb_pack").load("classes/Pack/getpackdata.ajax.php", {
      inputValue: $('#search-input').val()
    });

  });

  $(document).on('click', 'body', function(e) {
    if ($.contains(document.getElementById("searching-bar"), e.target) || $.contains(document.getElementById("center-top_bar"), e.target)) {


    }else {
      toggleSearchingBarStatus = false;
      $(".searching-bar").css("visibility", "hidden");
    }
  })





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
