
const taskComplete = document.querySelector("#taskComplete");
const taskIncomplete = document.querySelector("#taskIncomplete");


eventListener()

function eventListener() {

    taskComplete.addEventListener('click', showTaskComplete);
    taskIncomplete.addEventListener('click', showTaskIncomplete);
   


}


function showTaskComplete() {

    modalCompletas.style.display = "block";
    modalIncompletas.style.display = "none";

}

function showTaskIncomplete() {

    modalIncompletas.style.display = "block";
    modalCompletas.style.display = "none";



}
