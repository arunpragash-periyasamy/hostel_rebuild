

// checking field errors
let error = false;

// adding error message for input field
const add_error = (field_name, message, type = "class") => {
    error = true;
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
    }

    element.addClass("is-invalid");
    let error_element = $(`<div class = "invalid-feedback">${message}</div>`);
    error_element.insertAfter(element);
}


// removing error message of the input field
const remove_error = () => {
    error = false;

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

// validate mobile number
const is_valid_mobile = (mobile_number) => {
    pattern = "/^([6-9]\d{9}|(\+91)[6-9]\d{9})$/";
    if (pattern.test(mobile_number)) {
        return true;
    }
    return false;
}


// checking whether the field has value or not
const check_value = (element, error = "Fill the input field", type = "class") => {
        
    switch(type){

        case "input":
            $input_field = $(`input[name = "${element}"]`).val();
            break;
        case "select":
            $input_field = $(`${type}[name = "${element}"]`).val();
            break;
        case "class":    
            $input_field = $(`.${element}`).val();
            break;
        case "class":    
            $input_field = $(`#${element}`).val();
    }


    if ($input_field == "") {
        add_error(element, error, type);
    }
}





// function to submit the form data and store it in the database

const submit_form = async (formData, tableName, operation) => {
    
    // if the operation is update then make the operation put method
    operation = (operation === "update") ? "PUT" : operation;
    
    let data = {};
    // use filter function to remove empty values of the form data
    formData = await formData.filter(function (item) {
        return item.value !== ""; // Exclude items with empty values
    });
 

    data.table_name = tableName;
    data.form_data = formData;
    try{
        await $.ajax({
            url : "./functions/DBfunctions.php",
            method : "POST",
            data: data,
            success : (response) => {
                console.log("data submitted " + response);
            },
            error : (xhr, status, error) => {
                console.log(xhr + "  " + status + " " + error);
            }
        });
    }catch(error){
        console.log(error);
    }
    
}