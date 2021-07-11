const choice1= document.getElementById('choice1');
const choice2= document.getElementById('choice2');
const choice3= document.getElementById('choice3');
const answer_box= document.getElementById('answer-box');
const non_answer_box= document.getElementById('non_answer-box');

choice1.addEventListener('click' ,function(){

    choice1.style.background='#FE5129';
    choice1.style.color='white';
    choice2.style.background='#2A7CFE';
    choice2.style.color='white';

    non_answer_box.style="display: block;";
}
)

choice2.addEventListener('click' ,function(){
    
    choice2.style.background='#2A7CFE';
    choice2.style.color='white';
    
    answer_box.style="display: block;";
}
)

choice3.addEventListener('click' ,function(){

    choice3.style.background='#FE5129';
    choice3.style.color='white';
    choice2.style.background='#2A7CFE';
    choice2.style.color='white';

    non_answer_box.style="display: block;";
}
)