function generarLabel(idP,classP,textoP)
{
	let id = "id='"+idP+"' ";
	let className = "class='"+classP+"' ";
	return "<label "+id+className+">"+textoP+"</label>";
}

function generarDiv(idP,classP)
{
	let id = "id="+idP+" ";
	let className = "class="+classP+" ";
	return "<div "+id+className+">"+"</div>";
}

function generarRowTable(idP)
{
	let id = "id="+idP+" ";
	return "<tr "+id+">"+"</tr>";
}

function generarColumnTable(idP,textoP)
{
	let id = "id="+idP+" ";
	return "<td "+id+">"+textoP+"</td>";
}

function generarButton(idP,classP,textoP)
{
	let id = "id="+idP+" ";
	let className = "class='"+classP+"'' ";
	return "<button "+id+className+">"+textoP+"</button>";
}

function generarOption(idP,valueP,textoP)
{
	let id = "id="+idP+" ";
	let value = "value="+valueP+" ";

	return "<option " + value + " > " + textoP + "</option>";

}
