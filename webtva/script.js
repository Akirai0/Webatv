let register_btn = document.querySelector(".register-btn");
let login_btn = document.querySelector(".login-btn");
let form = document.querySelector(".form-box");
register_btn.addEventListener("click", () =>{
    form.classList.add("change-form");
})
login_btn.addEventListener("click", () =>{
    form.classList.remove("change-form");
})