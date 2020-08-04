
let toggleSideBarStatus = true;

var ud_element = document.getElementById('side-bar-btn');
ud_element.addEventListener('click', toggleSideBar , false);


function toggleSideBar(){


  let getSideBar = document.querySelector(".side-bar");


  if (toggleSideBarStatus === false) {


    getSideBar.style.margin = "0 0 0 0px";

    toggleSideBarStatus = true;

  }else{

    getSideBar.style.margin = "0 0 0 -230px";
    toggleSideBarStatus = false;


  }

}
