@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de controle</div>
                <div class="panel-body">
                	<div class="col-md-6">
                		<center>
		                	<a href="{{ route('user_edit', Auth::user()->id) }}">
		                    	<img alt="Editar Perfil" style="width: 50%;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNDY0LjExM3B4IiBoZWlnaHQ9IjQ2NC4xMTNweCIgdmlld0JveD0iMCAwIDQ2NC4xMTMgNDY0LjExMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDY0LjExMyA0NjQuMTEzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PHBhdGggZD0iTTMyMC4xMDksMTYwLjkyN0g4LjcyN2MtNC44MTEsMC04LjcyNywzLjkxLTguNzI3LDguNzI3djIxMC4zMTRjMCw0LjgxMSwzLjkxNiw4LjcyNCw4LjcyNyw4LjcyNGgzMTEuMzg4YzQuODEyLDAsOC43My0zLjkxMyw4LjczLTguNzI0VjE2OS42NTRDMzI4Ljg0NiwxNjQuODM2LDMyNC45MjcsMTYwLjkyNywzMjAuMTA5LDE2MC45Mjd6IE0xMTUuODQ1LDM1Ny4yMjNIMzEuNDQyVjM0MS4yMWg4NC40MDJWMzU3LjIyM3ogTTExNS44NDUsMzEzLjE0MUgzMS40NDJ2LTE2LjAwN2g4NC40MDJWMzEzLjE0MXogTTE0NC45NCwyNjcuNzgySDMxLjQ0MnYtMTYuMDA3SDE0NC45NFYyNjcuNzgyeiBNMjk0LjQ2MiwzNjAuNTQ1aC0xMi4zMDZjMC43MzItMTQuOTYtNi4xNjUtMzAuNjcxLTYuMTY1LTMwLjY3MWMtMi4zMzUtNS4xODQtMTYuNTY4LTkuNjY0LTE2LjU2OC05LjY2NGMtNy42MDEtMi42NzgtNy42NTQtNS4zNDQtNy42NTQtNS4zNDRjLTE0LjkyNCwyOS40MTItMjYuMjYxLDAuMDgzLTI2LjI2MSwwLjA4M2MtMS4wNDEsMy45Ni0xNi4zOTYsOC42MTgtMTYuMzk2LDguNjE4Yy00LjQ5MiwxLjczMS02LjM4Niw0LjMxNC02LjM4Niw0LjMxNGMtNi42MzgsOS44NDgtNy40MTIsMzEuNzU5LTcuNDEyLDMxLjc1OWMwLDAuMzM3LDAuMDM1LDAuNjA4LDAuMDY1LDAuOTA0aC02Ljc4VjI0Ny4wNDZoMTA1Ljg2NFYzNjAuNTQ1eiBNMzA2LjQ2NywyMTMuMjE2YzAsNC44MTctMy45MTksOC43MzMtOC43NDEsOC43MzNIMzEuNDU0Yy00LjgyMywwLTguNzM5LTMuOTE2LTguNzM5LTguNzMzdi0xNS4yODVjMC00LjgxNywzLjkxNi04LjcyMiw4LjczOS04LjcyMmgyNjYuMjcxYzQuODIyLDAsOC43NDEsMy45MDQsOC43NDEsOC43MjJWMjEzLjIxNnogTTIyMS43MzYsMjk5LjMxYzEuMTQ5LDkuNDYzLDkuMjk4LDE5LjI2OSwxNi42NzUsMTkuMjY5YzguNDg3LDAsMTYuNTU2LTEwLjMwOSwxNy44MTQtMTkuMjY5YzAuNDg0LTAuMzQ0LDEuMjU5LTEuMTY1LDEuNTU1LTMuMDI3YzAsMCwxLjgwOS02LjQ4OS0wLjYwNC01LjgwNGMwLjg0Ni0yLjQ4OCwzLjYxOC0xMi4yMzUtMS43NjEtMTguMjg4YzAsMC0yLjUxOS0zLjQzOS04LjY0Mi01LjI2N2wtMi44NS0wLjk4N2MtMS4xMzUtMC44MS0zLjQwNC0yLjc0Mi0zLjQwNC00Ljg4MmMwLDAtMS40MTIsMC42NjItMi4yNDYsMS44OGMwLjMyNS0xLjAwNSwwLjg4MS0xLjkyOCwxLjc2Mi0yLjY4NGMwLDAtMC45MjgsMC40ODQtMS43ODUsMS41MjVjLTAuNjYyLDAuMzc4LTIuMTkzLDEuNDA2LTIuNjk1LDMuMjYybDAuMDIzLTAuMTE3YzAsMC0wLjMxMS0wLjQyNi0xLjE1NS0wLjU0NWMtMC44NDMtMC4xMTctMi4zMTQsMC40NDktMi4zMTQsMC40NDlzLTguOTE5LDMuNDg4LTExLjUwNSwxMS41MDNjMCwwLTEuNTM3LDMuNjM1LDAuNDg0LDE0LjI5MmMtMi44NjMtMS4zNTQtMC45MTMsNS42NjItMC45MTMsNS42NjJDMjIwLjQ4MywyOTguMTUxLDIyMS4yNywyOTguOTY2LDIyMS43MzYsMjk5LjMxeiBNMjM3Ljk5MSwyNjIuMTEzYy0wLjQzOCwwLjYwOS0wLjgwNSwxLjM2NS0wLjk4MSwyLjI4MmwtMC4zMTktMC4xMThDMjM2LjkyNywyNjMuNTAyLDIzNy4zNDcsMjYyLjc2MywyMzcuOTkxLDI2Mi4xMTN6IE00NTUuNDQ4LDc1LjQyMWgtMzA5LjM3Yy00Ljc4OCwwLTguNjc0LDMuODg3LTguNjc0LDguNjc0djYyLjcyOGgxNzMuNjE0YzExLjYyLDAsMjEuOTM1LDUuNTY4LDI4LjUwMiwxNC4xNTZoOTAuNDI5djExMi43NmgtMTIuMjE4YzAuNzIxLTE0Ljg1OS02LjEyNC0zMC40NjQtNi4xMjQtMzAuNDY0Yy0yLjMxNi01LjE1NC0xNi40NjEtOS42LTE2LjQ2MS05LjZjLTcuNTQyLTIuNjU5LTcuNjAyLTUuMzA4LTcuNjAyLTUuMzA4Yy0xNC44MjQsMjkuMjE3LTI2LjA5LDAuMDgzLTI2LjA5LDAuMDgzYy0wLjgxNSwzLjExNC0xMC40OTcsNi42NDktMTQuNTI4LDcuOTkxdjY1LjI3MmgxMDguNTE2YzQuNzg3LDAsOC42NzEtMy44ODQsOC42NzEtOC42NzFWODQuMDk2QzQ2NC4xMTksNzkuMzA4LDQ2MC4yMzUsNzUuNDIxLDQ1NS40NDgsNzUuNDIxeiBNNDQxLjg4OSwxMjcuMzcyYzAsNC43ODgtMy44OSw4LjY3NC04LjY3Nyw4LjY3NEgxNjguNjU1Yy00Ljc4OCwwLTguNjgtMy44ODYtOC42OC04LjY3NHYtMTUuMTg4YzAtNC43ODgsMy44OTMtOC42NjUsOC42OC04LjY2NUg0MzMuMmM0Ljc4NywwLDguNjgzLDMuODc3LDguNjgzLDguNjY1djE1LjE4OEg0NDEuODg5eiBNMzU2LjE3MSwyMDkuODk3YzAuMjk1LDEuODU5LDEuMDc1LDIuNjYzLDEuNTQ5LDMuMDA4YzEuMTQxLDkuNDA3LDkuMjMyLDE5LjE0NiwxNi41NjIsMTkuMTQ2YzguNDI5LDAsMTYuNDUtMTAuMjQxLDE3LjY5Ny0xOS4xNDZjMC40ODQtMC4zNDYsMS4yNTMtMS4xNTUsMS41NDItMy4wMDhjMCwwLDEuODAzLTYuNDQ2LTAuNTkxLTUuNzZjMC44MzMtMi40ODIsMy41ODgtMTIuMTYxLTEuNzQ5LTE4LjE3OGMwLDAtMi41MDctMy40MTQtOC41ODMtNS4yMjhsLTIuODMxLTAuOTgxYy0xLjEyOS0wLjgxLTMuMzgxLTIuNzIyLTMuMzgxLTQuODUzYzAsMC0xLjQwNywwLjY1My0yLjIzNCwxLjg2NWMwLjMxOS0wLjk4NywwLjg3NS0xLjkxNSwxLjc1LTIuNjY2YzAsMC0wLjkyMywwLjQ3OS0xLjc3MywxLjUxM2MtMC42NjIsMC4zNzUtMi4xNzYsMS40MDctMi42ODQsMy4yNDVsMC4wMjktMC4xMjFjMCwwLTAuMzEzLTAuNDE3LTEuMTUyLTAuNTM4Yy0wLjgzNC0wLjEyMS0yLjMsMC40NC0yLjMsMC40NHMtOC44NiwzLjQ2NC0xMS40MjUsMTEuNDM1YzAsMC0xLjUzMSwzLjYwOCwwLjQ4NCwxNC4yMDFDMzU0LjIzMiwyMDIuOTI2LDM1Ni4xNzEsMjA5Ljg5NywzNTYuMTcxLDIwOS44OTd6IE0zNzMuODU1LDE3NS45NTVjLTAuNDI1LDAuNjAxLTAuODA0LDEuMzUxLTAuOTY5LDIuMjdsLTAuMzI1LTAuMTIxQzM3Mi44MDQsMTc3LjMyOSwzNzMuMjE4LDE3Ni41OTYsMzczLjg1NSwxNzUuOTU1eiIvPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48L3N2Zz4=">
		                	
		                		<p>Editar Perfil</p>
		                	</a>
	                	</center>
                	</div>
                	<div class="col-md-6">
                		<center>
		                	<a href="{{ route('voucher.index') }}">
		                    	<img alt="Editar Perfil" style="width: 50%;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PGc+PHBhdGggZD0iTTQ4MC45ODMsODguNjQ1aC0wLjkzM2MtMTEuNiwwLTQzMS4zMjksMC00NDguMSwwQzE0LjMzMyw4OC42NDUsMCwxMDIuOTc4LDAsMTIwLjU5NXYyNzAuODA5YzAsMTcuNjE3LDE0LjMzMywzMS45NSwzMS45NSwzMS45NWMxNy4xODUsMCw0MzYuOTM0LDAsNDQ4LjEsMGgwLjkzM2MxNy4xMDMsMCwzMS4wMTctMTMuOTE1LDMxLjAxNy0zMS4wMTd2LTAuOTMzVjEyMC41OTV2LTAuOTMzQzUxMiwxMDIuNTYsNDk4LjA4NSw4OC42NDUsNDgwLjk4Myw4OC42NDV6IE0zMDQuMDksMTg0LjY5OGwxMS41NDQsMTEuNTQ0bC0xMS41NDQsMTEuNTQ1Yy0xMC4yMjgsMTAuMjI4LTEwLjIyOSwyNi44NzEsMCwzNy4xMDJsMTEuNTQ0LDExLjU0NGwtMTEuNTQ0LDExLjU0NGMtMTAuMjI4LDEwLjIyOC0xMC4yMjksMjYuODcxLDAsMzcuMTAybDExLjU0NCwxMS41NDRMMzA0LjA5LDMyOC4xN2MtMTAuMjI4LDEwLjIyOC0xMC4yMjksMjYuODcxLDAsMzcuMTAybDExLjU0NCwxMS41NDRjLTEyLjY0MiwxMi42NC0xMi4wMjUsMTEuOTY4LTEzLjEzMiwxMy4yOTJIMzMuMjQ3VjEyMS44OTJoMjY4LjU2NWMxLjQ2LDEuOTA4LDEuMjE1LDEuNTUyLDEzLjgyMywxNC4xNmwtMTEuNTQ1LDExLjU0NUMyOTMuODYxLDE1Ny44MjYsMjkzLjg2MSwxNzQuNDcxLDMwNC4wOSwxODQuNjk4eiBNNDc4Ljc1MywzOTAuMTA5SDM0OC4xNzJjNS45MDQtMTAuMDUyLDQuNTQ3LTIzLjIyNC00LjA3LTMxLjg0NGwtMTEuNTQ0LTExLjU0NGwxMS41NDQtMTEuNTQ0YzEwLjIyOC0xMC4yMjgsMTAuMjI5LTI2Ljg3MiwwLTM3LjEwMmwtMTEuNTQ0LTExLjU0NGwxMS41NDQtMTEuNTQ0YzEwLjIyOC0xMC4yMjgsMTAuMjI5LTI2Ljg3MiwwLTM3LjEwMmwtMTEuNTQ0LTExLjU0NGwxMS41NDQtMTEuNTQ0YzQuOTU1LTQuOTU1LDcuNjg0LTExLjU0Myw3LjY4NC0xOC41NTJjMC03LjAwNy0yLjcyOC0xMy41OTYtNy42ODQtMTguNTUxbC0xMS41NDQtMTEuNTQ0bDExLjU0NS0xMS41NDVjOC44NjctOC44NjksMTAuMDQ2LTIyLjU1OSwzLjUzNy0zMi43MWgxMzEuMTEzVjM5MC4xMDl6Ii8+PC9nPjwvZz48Zz48Zz48cGF0aCBkPSJNMjA1LjAzNCwyNDQuMDQ4Yy0xOC45MzIsMC0zMy40MDksOC4wMTgtMzMuNDA5LDMwLjA2N3YzMS42MjhjMCwyMi4wNDksMTQuNDc3LDMwLjA2NywzMy40MDksMzAuMDY3YzE4LjcwOSwwLDMzLjQwOS04LjAxOCwzMy40MDktMzAuMDY3di0zMS42MjhDMjM4LjQ0MiwyNTIuMDY2LDIyMy43NDMsMjQ0LjA0OCwyMDUuMDM0LDI0NC4wNDh6IE0yMDUuMDM0LDMxNi40MzNjLTYuOTA0LDAtMTAuOTE0LTMuMzQxLTEwLjkxNC0xMC42OXYtMzEuNjI4YzAtNy4zNSw0LjAwOC0xMC42OSwxMC45MTQtMTAuNjljNi45MDQsMCwxMS4xMzcsMy4zNDEsMTEuMTM3LDEwLjY5djMxLjYyOGgwQzIxNi4xNywzMTMuMDkzLDIxMS45MzgsMzE2LjQzMywyMDUuMDM0LDMxNi40MzN6Ii8+PC9nPjwvZz48Zz48Zz48cGF0aCBkPSJNMTkyLjExNSwxNjMuMmMtNC4wMDgsMC03LjU3MywxLjc4MS05LjM1NCw1LjU2OGwtNzguMTc1LDE2MC41ODRjLTAuNjY4LDEuMzM2LTEuMTE0LDIuODk1LTEuMTE0LDQuMjMxYzAsNS41NjgsNC44OTksMTEuODA0LDEyLjQ3MiwxMS44MDRjNC4yMzIsMCw4LjQ2NC0yLjIyOCwxMC4wMjMtNS41NjhsNzguMzk5LTE2MC41ODRjMC42NjgtMS4zMzUsMC44OS0yLjg5NSwwLjg5LTQuMjMxQzIwNS4yNTUsMTY3Ljg3NywxOTguMzUxLDE2My4yLDE5Mi4xMTUsMTYzLjJ6Ii8+PC9nPjwvZz48Zz48Zz48cGF0aCBkPSJNMTAyLjgwMywxNzIuMzMyYy0xOC45MzIsMC0zMy40MDksOC4wMTgtMzMuNDA5LDMwLjA2N3YzMS42MjdjMCwyMi4wNDksMTQuNDc3LDMwLjA2OCwzMy40MDksMzAuMDY4YzE4LjcwOSwwLDMzLjQwOS04LjAxOSwzMy40MDktMzAuMDY4di0zMS42MjdDMTM2LjIxMiwxODAuMzUsMTIxLjUxMiwxNzIuMzMyLDEwMi44MDMsMTcyLjMzMnogTTExMy45NCwyMzQuMDI2YzAsNy4zNS00LjIzMSwxMC42OTEtMTEuMTM3LDEwLjY5MWMtNi45MDQsMC0xMC45MTQtMy4zNDEtMTAuOTE0LTEwLjY5MXYtMzEuNjI3YzAtNy4zNSw0LjAxLTEwLjY5LDEwLjkxNC0xMC42OXMxMS4xMzcsMy4zNDEsMTEuMTM3LDEwLjY5VjIzNC4wMjZ6Ii8+PC9nPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48L3N2Zz4=">
		                    	<p>Lista De Vouchers</p>
		                    </a>
	                    </center>
                	</div>
            	</div>
        	</div>
    	</div>
	</div>
</div>
@endsection
