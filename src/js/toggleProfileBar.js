let toggleProfilBarStatus = false;

var ud_element2 = document.getElementById('profile-bar-btn');
ud_element2.addEventListener('click', toggleProfileBar , false);


function toggleProfileBar(){

  let getProfileBar = document.querySelector(".topbar-profile-bar");


  if (toggleProfilBarStatus === false) {

    getProfileBar.style.visibility = "visible";

    toggleProfilBarStatus = true;

  }else {

    getProfileBar.style.visibility = "hidden";

    toggleProfilBarStatus = false;

  }

}
