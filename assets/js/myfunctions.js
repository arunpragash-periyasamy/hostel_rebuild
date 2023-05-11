
// adding error message under the input field
const add_error = (field_name, message, type = "class") => {
    type = type.toLowerCase();
    let element;
    if (type === "class") {
        element = $(`.${field_name}`);
    }

    else if (type === "id") {
        element = $(`#${field_name}`);
    }

    else if (type === "input" || type === "select") {
        element = $(`${type}[name = "${field_name}"]`);
        console.log(field_name)
        // console.log(element);
    }

    element.addClass("is-invalid");
    let error_element = $(`<div class = "invalid-feedback">${message}</div>`);
    error_element.insertAfter(element);
}


// adding error message under the input field
const remove_error = () => {
    $(".invalid-feedback").remove();
    $("*").removeClass("is-invalid");
}

// validate emailid
const is_valid_email = (email) => {
    pattern = "^[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)?kongu\.edu\.\d{2}[a-zA-Z]{3}$";
    if (pattern.test(email)) {
        return true;
    }
    return false;
}

const check_value = (element, error = "Fill the input field", type = "class") => {
    $input_field = $(`.${element}`).val();
    if ($input_field == "") {
        add_error(element, error, type);
    }
}