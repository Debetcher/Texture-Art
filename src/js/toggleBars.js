//Variables

// 
// let barArrayDiv = [];
// let barArrayBtn = [];
// let barArrayVis = [];
//
//
// var barsDiv = $(".bars-array-div");
// var barsBtn = $(".bars-array-btn");
// var fullPage = document.getElementById('fP');
//
//
// for (var i = 0; i < barsDiv.length; i++) {
//   barArrayDiv[i] = barsDiv[i];
//   barArrayBtn[i] = barsBtn[i];
//   barArrayVis[i] = false;
//
// }


//triggers


//
// barArrayBtn.forEach((item, i) => {
//   item.addEventListener('click', function vb(e) {
//     viewBar(event, i);
//   }, false);
// });





//functions

// function viewBar(e, i) {
//   barArrayDiv[i].style.visibility = "visible";
//
//   barArrayBtn.forEach((item, i) => {
//     item.removeEventListener('click', vb, false);
//   });
//
// }
//






//
// let NotiBarStatus = false;
// let InviteBarStatus = false;
// let ProfileBarStatus = false;
//
// var statusar = [NotiBarStatus,InviteBarStatus,ProfileBarStatus];
//
//
// //ContentBars
//
// let getNotiBar = document.querySelector(".topbar-noti-bar");
// let getInviteBar = document.querySelector(".topbar-invite-bar");
// let getProfileBar = document.querySelector(".topbar-profile-bar");
//
//
//
// var bars = [getNotiBar, getInviteBar, getProfileBar];
//
//
//
// //buttons
// var ud_noti_btn = document.getElementById('noti_btn');
// ud_noti_btn.addEventListener('click', viewBar, false);
//
// var ud_invite_btn = document.getElementById('invite_btn');
// ud_invite_btn.addEventListener('click',viewBar , false);
//
// var ud_profile_btn = document.getElementById('profile-bar-btn');
// ud_profile_btn.addEventListener('click',viewBar , false);
//
// var btns = [ud_noti_btn, ud_invite_btn, ud_profile_btn];
//
// //fullPage
// var ud_fullPage = document.getElementById('fP');
//
//
//
//
//
//
// function viewBar(event){
//
// for (var i = 0; i < btns.length; i++) {
//   if (btns[i].contains(event.target)) {
//
//     bars[i].style.visibility = "visible";
//
//     statusar[i] = true;
//
//   }
// }
// ud_noti_btn.removeEventListener('click', viewBar , false);
// ud_invite_btn.removeEventListener('click', viewBar , false);
// ud_profile_btn.removeEventListener('click', viewBar , false);
// event.stopImmediatePropagation();
// ud_fullPage.addEventListener('click', hideBar , false);
//
//
//
//
//
// }
//
// function hideBar(event){
//
//   var barcounter = 0;
// for (var i = 0; i < bars.length; i++) {
//
//   if (bars[i].contains(event.target)) {
//     barcounter++;
//
//   }
//
// }
//
// if (barcounter == 0) {
//
//   for (var i = 0; i < btns.length; i++) {
//     bars[i].style.visibility = "hidden";
//
//     statusar[i] = false;
//   }
//
//
//
//
//
//   var c = 0;
//   for (var i = 0; i < btns.length; i++) {
//
//     if (btns[i].contains(event.target)) {
//
//       bars[i].style.visibility = "visible";
//
//       statusar[i] = true;
//
//       c++;
//
//     }
//   }
//
//
//
//
//   if (c==0) {
//
//     ud_fullPage.removeEventListener('click', hideBar , false);
//     event.stopImmediatePropagation();
//     ud_noti_btn.addEventListener('click', viewBar , false);
//     ud_invite_btn.addEventListener('click', viewBar , false);
//     ud_profile_btn.addEventListener('click', viewBar , false);
//   }
//
// }
//
//
//
//
//
//
//
//
//
//
//
//
// }
