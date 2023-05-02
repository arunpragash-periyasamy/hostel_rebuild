
// adding error message under the input field
const add_error = (field_name, message, type="input") => {
    let element = $(`${type}[name = "${field_name}"]`);
    element.addClass("is-invalid");
    let error_element = $(`<div class = "invalid-feedback">${message}</div>`);
    error_element.insertAfter(element);
}


// adding error message under the input field
const remove_error = () =>{
    $(".invalid-feedback").remove();
    $("*").removeClass("is-invalid");
}