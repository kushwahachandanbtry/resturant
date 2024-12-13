function handleRegisterEmployee() {
    const registerOpen = document.querySelector('.new-register');
    const closeBtn = document.querySelector('.close-btn');
    const registerSection = document.querySelector('.register-emp');


    registerOpen.addEventListener('click', function() {
        registerSection.style.display = 'block';
    });
    closeBtn.addEventListener('click', function() {
        registerSection.style.display = 'none';
    });
}


function handleFoodAdd(){
    const foodSection = document.querySelector('.add-food');
        foodSection.style.display = 'block';
    
}
function foodClose(){
    const foodSection = document.querySelector('.add-food');
        foodSection.style.display = 'none';
}




window.addEventListener('load', function() {
    handleRegisterEmployee();
})

