// checking field errors
let error = false;

// adding error message for input field
const addError = (field_name, message, type = "class") => {
  error = true;
  type = type.toLowerCase();
  let element;
  if (type === "class") {
    element = $(`.${field_name}`);
  } else if (type === "id") {
    element = $(`#${field_name}`);
  } else if (type === "input" || type === "select") {
    element = $(`${type}[name = "${field_name}"]`);
  }

  element.addClass("is-invalid");
  let error_element = $(`<div class = "invalid-feedback">${message}</div>`);
  error_element.insertAfter(element);
};

// removing error message of the input field
const removeError = () => {
  error = false;

  $(".invalid-feedback").remove();
  $("*").removeClass("is-invalid");
};

// validate emailid
const isValidEmail = (email) => {
  pattern = "^[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+.)?kongu.edu.d{2}[a-zA-Z]{3}$";
  if (pattern.test(email)) {
    return true;
  }
  return false;
};

// validate mobile number
const isValidMobile = (mobile_number) => {
  pattern = "/^([6-9]d{9}|(+91)[6-9]d{9})$/";
  if (pattern.test(mobile_number)) {
    return true;
  }
  return false;
};

// checking whether the field has value or not
const checkValue = (
  element,
  error = "Fill the input field",
  type = "class"
) => {
  switch (type) {
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
    addError(element, error, type);
  }
};

// reset the form data
const resetForm = (id) => {
  $(`#${id}`).trigger("reset");
};

// function to submit the form data and store it in the database

const submitForm = async (tableName, operation = "insert", formId = "form") => {
  operation = operation.toLowerCase();

  let formData = $(`#${formId}`).serializeArray();
  // remove the empty fields
  formData = formData.filter((item) => {
    if (item.value != "") {
      return item;
    }
  });

  // convert the object as {field name : value}
  formData = formData.map((item) => {
    return { [item.name]: item.value }; // return the data
  });

  // merge the multiple ojects in a single object
  formData = $.extend({}, ...formData);

  let data = {};
  data.tableName = tableName;
  console.log(formData);

  switch (operation) {
    case "insert":
      try {
        data.formData = formData;
        await $.ajax({
          url: "./functions/DBfunctions.php",
          method: "POST",
          data: data,
          success: (response) => {
            topRightAlert(response.message);
            resetForm(formId);
            console.log(response);
          },
          error: (xhr, status, error) => {
            console.log(xhr + "  " + status + " " + error);
          },
        });
      } catch (error) {
        console.log(error);
      }
      break;

    case "delete":
      try {
        data.id = formData.id;
        await $.ajax({
          url: "./functions/DBfunctions.php",
          method: "DELETE",
          data: data,
          success: (response) => {
            resetForm(formId);
            topRightAlert(response.message);
            console.log(response);
          },
          error: (xhr, status, error) => {
            console.log(xhr + " " + status + " " + error);
          },
        });
      } catch (e) {}
      break;

    case "update":
      data.id = formData.id;
      delete formData["id"];
      data.formData = formData;

      await $.ajax({
        url: "./functions/DBfunctions.php",
        method: "PUT",
        data: data,
        success: (response) => {
          console.log(response);
          topRightAlert(response.message);
          resetForm(formId);
        },
        error: (xhr, status, error) => {
          console.log(xhr, error);
        },
      });
      break;
    default:
      break;
  }
};

// submit the data for crud operation from single page to store in multiple tables
const submitData = (data) => {
  entry = Object.entries(data);
  
  data = {};
  
  entry.forEach((element) => {
    const [key, value] = element;
    fun = value.map((index) => {
      input = $(`[name='${index}']`).val();
      return { [index]: input };
    });
    merge = {};
    fun.forEach((element) => {
      Object.assign(merge, element);
    });
    data[key] = merge;
  });
  
};

// alert functions

// top right corner
const topRightAlert = (message) => {
  Swal.fire({
    position: "top-end",
    title: message,
    showConfirmButton: !1,
    timer: 1500,
    buttonsStyling: !1,
  });
};
