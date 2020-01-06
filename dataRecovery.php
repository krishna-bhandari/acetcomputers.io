<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		input{
			width: 100%;
			font-size: 20px;
			border-radius: 10px;

		}
		td{
			font-size: 20px;
		}
	</style>
	
</head>
<body bgcolor="brown">

<!-- 	<p id="date"></p> -->
<center>
	<form style="background-color: white;border-color: black;border-radius: 20px;">
		<h1>Desktop Entry</h1>
		<table border="0" cellpadding="5">
			<tr>
				<td>	Entry number :</td>
				<td><input type="text" id="entry_num"readonly=""></td>
				<td></td>
				<td> Entry Date : </td>
				<td>
					<p id="date"><input type="date" id="date" readonly=""></p></td>
				
			</tr>
			<tr>
				<td>Customer name : </td>
				<td><input type="text" id="cName" required=""></td>
				<td></td>
				<td>Address : </td>
				<td><input type="text" id="address"></td>
			</tr>
			<tr>
				<td>Device name : </td>
				<td><input type="text" id="cName" required=""></td>
				<td></td>
				<td>Device Detail : </td>
				<td><input type="text" id="address"></td>
			</tr>
			<tr>

				<td>Main Problem :</td>
				<td><input type="text" id="problem" width="100%"></td>
				<td></td>
				<td>Contact : </td>
				<td><input type="text" id="phone"></td>
			</tr>
			<tr>
				<td>technician Id				</td>
				<td><input type="text" id="tech_id"></td>
				<td></td>
				<td>Status</td><td><input type="text" id="status"></td>
			</tr>

			<!-- <tr class="btm_btns">
				<td></td><td></td><td><input type="submit" value="Enter"></td><td><input type="button" value="Show all records"></td><td><a href="office system.html"><input type="button" value="Back">
					
				</a></td>
			</tr> -->
		</table>
		<input type="submit" value="Enter"><input type="button" value="Show all records">
		<a href="office system.html"><input type="button" value="Back">
		</a>
	</form>
</center>
<script type="text/javascript">
		d= new Date();
		h=d.getHours();
		m=d.getMinutes();
		date=
		document.getElementById("date").innerHTML= (d.getDate()+"/"+ d.getMonth()+"/"+ d.getFullYear());
	</script>
</body>
</html>