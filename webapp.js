'use strict';

// function popupImage() {
//     var popup = document.getElementById('modal_area');
//     if(!popup) return;
  
//     var blackBg = document.getElementById('js-black-bg');
//     var closeBtn = document.getElementById('close_modal');
//     var showBtn = document.getElementById('open_modal');
  
//     closePopUp(blackBg);
//     closePopUp(closeBtn);
//     closePopUp(showBtn);
//     function closePopUp(elem) {
//       if(!elem) return;
//       elem.addEventListener('click', function() {
//         popup.classList.add('show');
//       });
//     }
//   }
//   popupImage();

var showBtn = document.getElementById('open_modal');
var popup = document.getElementById('modal_area');

showBtn.addEventListener('click', function(){
    popup.classList.add('show');
    console.log('aa');
})