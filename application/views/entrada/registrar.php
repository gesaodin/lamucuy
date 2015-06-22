<h2>Formulario de Registro</h2>
		<form class="iconos2">
			<table style="width: 97%;">
				<tr>
					<td>
						<input class="icon13"  placeholder="Nombre" required="required" type="text" name="nomb" id="nomb" />
					</td>
					<td>
						<input class="icon13"  placeholder="Apellido" required="required" type="text" name="apel" id="apel" />
					</td>
				</tr>
				<tr>
					<td>
						<select name="tipo" id="tipo">
							<option value="V">Venezolano</option>
							<option value="J">Juridico</option>
							<option value="E">Extranjero</option>
						</select>
					</td>
					<td>
						<input class="icon25"  placeholder="Cedula / Rif" required="required" type="text" name="cedu" id="cedu" />
				</tr>
				<tr>
					<td>
						<input class="icon3" type="text" placeholder="Login/Seudonimo" class="mayuscula" name="seud" id="seud"/>
					</td>
					<td>
						<input class="icon13"  placeholder="Clave" required="required" type="password" name="clav" id="clav"/>
					</td>
				</tr>
				<tr>
					<td>
						<input class="icon4" name="corr" id="corr" type="text" placeholder="Correo Electronico" class="mayuscula"/>
					</td>
					<td>
						<input class="icon14"  placeholder="Numero Celular" required="required" type="text" name="celu" id="celu" />
					</td>
				</tr>
				<tr>
					<td>
						<input class="icon14"  placeholder="Telefono Hab." required="required" type="text" name="telf" id="telf"/>
					</td>
					<td>
						<input class="icon15"  placeholder="Empresa" required="required" type="text" name="empr" id="empr"/>
					</td>
				</tr>
				<tr>
					<td>
						<input class="icon6" name="pa" type="text" placeholder="Pagina Web" class="mayuscula" name="pagi" id="pagi"/>
					</td>
					<td>
						<textarea name="dire" id="dire" rows="10" cols="50" wrap="off" placeholder="Direccion"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" value="Registrar" onclick="Registrar();"/>
					</td>
				</tr>
			</table>
		</form>