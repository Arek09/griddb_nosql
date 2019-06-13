
<html lang="pl">


	<head>

		<meta charset="UTF-8"/>
		<title> Tekst</title>
			<script>
			
			function deletee(delid)
			{
				if(confirm("Chcesz usunac?"))
				{
					window.location.href='delete.php?id='+delid+''; //skrypt od okna czy usunac rekord z bazy
					//delid odpowiada za numer rekordu id
					return true;
					
				}
							
			}
			
			
			</script>

	
			<?php
			
			
				include("connect.php");
				$result=mysqli_query($conn, "SELECT * FROM test");
				
	
			
			
			?>
			
			<style>
				
				th
				{
						border-bottom:1px solid;
					
				}
				th:first-child
				{
					border:0px;
				}
				td
				{
					border-bottom:1px solid;
					
				}
				tr:hover
				{
					background-color:white;
				}
				body
				{
					background-color:#F0ECFF;
				}
				table
				{
					text-align:center;
				}
				a
				{
					color:black;
				}
				td:last-child
				{
					border: 0px;
				}
				td:first-child
				{
					border:0px;
				}
			</style>
			

				</head>


					<body  >


							<h1>Test baza</h1>

							<table>


								<tr>Tabela testowa</tr>
								
									<th>lp</th>							
									<th>imie</th>
									<th>nazwisko</th>
									<th>wiek</th>
									<th>akcja</th>
									
										<?php
										$n=1; // zmienna do liczby poj. 
									
											while( $rows=mysqli_fetch_array($result)  )
												
												{
												
												
												
										?>
										
									<tr>
									
									<td> <?php echo $n++."."; ?></td> <!-- liczba poj-->
									<td><?php echo $rows['imie']; ?></td>
									<td><?php echo $rows['nazwisko']; ?></td>
									<td><?php echo $rows['wiek']; ?></td>
									<td> <input type="button" onClick="deletee(<?php echo $rows['id']; ?>)" name="delete" value="usun" </td>
									</tr>
									
									
									<?php
								}
							?>
							</table>
							
							<br>
<form name="form1" method="post" action="dodaj.php">

  imie: <input  type="text" name="imie" size="20">
  <br>
  nazwisko: <input type="text" name="nazwisko" size="20">
  <br>
  wiek: <input type="number" name="wiek" size="20">
  <br>

  <input value="dodaj do bazy" type="submit">
</form>

<?php
	

						$query2="SELECT ROUND(sredni_wiek,0) from test";
						
					include("connect.php"); //załączenie pliku connect
					
					$query1="SELECT AVG(wiek) as 'sredni_wiek' FROM test ".$query2; //zapytanie
					$res=mysqli_query($conn,$query1); //połączenie zapytania z connectem
					
					$data=mysqli_fetch_array($res); //zapisanie do zmiennej wyświetlenia zapytania
					echo "Średni wiek ".$data['sredni_wiek'];
					
					
						
									
		
?>


					
					</body>


</html>
