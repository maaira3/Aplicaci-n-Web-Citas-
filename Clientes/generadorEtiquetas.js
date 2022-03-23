function generarLabel(idP,classP,textoP)
{
	let id = "id="+idP+" ";
	let className = "class="+classP+" ";
	return "<label "+id+className+">"+textoP+"</label>";
}

function generarDiv(idP,classP)
{
	let id = "id="+idP+" ";
	let className = "class="+classP+" ";
	return "<div "+id+className+">"+textoP+"</div>";
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
