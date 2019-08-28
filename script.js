
var selectedRow = null

function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
    }
}

function readFormData() {
    var formData = {};
    formData["Sid"] = document.getElementById("Sid").value;
    formData["sname"] = document.getElementById("sname").value;
    formData["Email"] = document.getElementById("Email").value;
    formData["class"] = document.getElementById("class").value;
    formData["year"] = document.getElementById("year").value;
    formData["city"] = document.getElementById("city").value;
    formData["country"] = document.getElementById("country").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("Studentlist").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.Sid;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.sname;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.Email;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.class;
    cell5 = newRow.insertCell(4);
    cell5.innerHTML = data.year;
    cell6 = newRow.insertCell(5);
    cell6.innerHTML = data.city;
    cell7 = newRow.insertCell(6);
    cell7.innerHTML = data.country;
    cell8 = newRow.insertCell(7);
    cell8.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
}

function resetForm() {
    document.getElementById("Sid").value = "";
    document.getElementById("sname").value = "";
    document.getElementById("Email").value = "";
    document.getElementById("class").value = "";
    document.getElementById("year").value = "";
    document.getElementById("city").value = "";
    document.getElementById("country").value = "";
    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("Sid").value = selectedRow.cells[0].innerHTML;
    document.getElementById("sname").value = selectedRow.cells[1].innerHTML;
    document.getElementById("Email").value = selectedRow.cells[2].innerHTML;
    document.getElementById("class").value = selectedRow.cells[3].innerHTML;
    document.getElementById("year").value = selectedRow.cells[4].innerHTML;
    document.getElementById("city").value = selectedRow.cells[5].innerHTML;
    document.getElementById("country").value = selectedRow.cells[6].innerHTML;
    
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.Sid;
    selectedRow.cells[1].innerHTML = formData.sname;
    selectedRow.cells[2].innerHTML = formData.Email;
    selectedRow.cells[3].innerHTML = formData.class;
    selectedRow.cells[4].innerHTML = formData.year;
    selectedRow.cells[5].innerHTML = formData.city;
    selectedRow.cells[6].innerHTML = formData.country;
}

function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("Studentlist").deleteRow(row.rowIndex);
        resetForm();
    }
}
function validate() {
    isValid = true;
    if (document.getElementById("Sid").value == "") {
        isValid = false;
        document.getElementById("SidValidationError").classList.remove("hide");
    } else {
        isValid = true;
        if (!document.getElementById("SidValidationError").classList.contains("hide"))
            document.getElementById("SidValidationError").classList.add("hide");
    }
    return isValid;
}

