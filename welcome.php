<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
	<style type="text/css">
		body > table{
    width: 80%;
}

table{
    border-collapse: collapse;
}
table.list{
    width:100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
tr:nth-child(even),table.list thead>tr {
    background-color: #dddddd;
}

input[type=text], input[type=number],input[type=Email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit]{
    width: 30%;
    background-color: #ddd;
    color: #000;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form div.form-action-buttons{
    text-align: right;
}

a{
    cursor: pointer;
    text-decoration: underline;
    color: #0000ee;
    margin-right: 4px;
}

label.validation-error{
    color:   red;
    margin-left: 5px;
}

.hide{
    display:none;
}
	</style>

</head>
<body>
 <table>
        <tr>
            <td>
                <form onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">
                	 <div>
                        <label>Student id</label><label class="validation-error hide" id="SidValidationError">This field is required.</label>
                        <input type="text" name="Sid" id="Sid">
                    </div>
                    <div>
                        <label>Student Name</label>
                        <input type="text" name="sname" id="sname">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="Email" name="Email" id="Email">
                    </div>
                    <div>
                        <label>Class</label>
                        <input type="text" name="class" id="class">
                    </div>
                    <div>
                        <label>Enrollment Year</label>
                        <input type="text" name="year" id="year">
                    </div>
                    <div>
                        <label>City</label>
                        <input type="text" name="city" id="city">
                    </div>
                    <div>
                        <label>Country</label>
                        <input type="text" name="country" id="country">
                    </div>
                    <div  class="form-action-buttons">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </td>
        <td>
     <table class="list" id="Studentlist">
                    <thead>
                        <tr>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Class</th>
                            <th>Enrollment Year</th>
                            <th>City</th>
                            <th>Country</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
     </table>
</td>
</tr>
</table>
<script src="script.js"></script>
</body>
</html>