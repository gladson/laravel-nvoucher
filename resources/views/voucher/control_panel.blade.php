@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de controle</div>
                <div class="panel-body">
                    @if (Auth::check() && Auth::user()->IsAdmin())
                    <div class="col-md-6">
                    @else
                    <div class="col-md-4">
                    @endif
                		<center>
		                	<a href="{{ route('user_edit', Auth::user()->id) }}">
		                    	<img alt="Editar perfil" style="width: 50%;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNDY0LjExM3B4IiBoZWlnaHQ9IjQ2NC4xMTNweCIgdmlld0JveD0iMCAwIDQ2NC4xMTMgNDY0LjExMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDY0LjExMyA0NjQuMTEzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PHBhdGggZD0iTTMyMC4xMDksMTYwLjkyN0g4LjcyN2MtNC44MTEsMC04LjcyNywzLjkxLTguNzI3LDguNzI3djIxMC4zMTRjMCw0LjgxMSwzLjkxNiw4LjcyNCw4LjcyNyw4LjcyNGgzMTEuMzg4YzQuODEyLDAsOC43My0zLjkxMyw4LjczLTguNzI0VjE2OS42NTRDMzI4Ljg0NiwxNjQuODM2LDMyNC45MjcsMTYwLjkyNywzMjAuMTA5LDE2MC45Mjd6IE0xMTUuODQ1LDM1Ny4yMjNIMzEuNDQyVjM0MS4yMWg4NC40MDJWMzU3LjIyM3ogTTExNS44NDUsMzEzLjE0MUgzMS40NDJ2LTE2LjAwN2g4NC40MDJWMzEzLjE0MXogTTE0NC45NCwyNjcuNzgySDMxLjQ0MnYtMTYuMDA3SDE0NC45NFYyNjcuNzgyeiBNMjk0LjQ2MiwzNjAuNTQ1aC0xMi4zMDZjMC43MzItMTQuOTYtNi4xNjUtMzAuNjcxLTYuMTY1LTMwLjY3MWMtMi4zMzUtNS4xODQtMTYuNTY4LTkuNjY0LTE2LjU2OC05LjY2NGMtNy42MDEtMi42NzgtNy42NTQtNS4zNDQtNy42NTQtNS4zNDRjLTE0LjkyNCwyOS40MTItMjYuMjYxLDAuMDgzLTI2LjI2MSwwLjA4M2MtMS4wNDEsMy45Ni0xNi4zOTYsOC42MTgtMTYuMzk2LDguNjE4Yy00LjQ5MiwxLjczMS02LjM4Niw0LjMxNC02LjM4Niw0LjMxNGMtNi42MzgsOS44NDgtNy40MTIsMzEuNzU5LTcuNDEyLDMxLjc1OWMwLDAuMzM3LDAuMDM1LDAuNjA4LDAuMDY1LDAuOTA0aC02Ljc4VjI0Ny4wNDZoMTA1Ljg2NFYzNjAuNTQ1eiBNMzA2LjQ2NywyMTMuMjE2YzAsNC44MTctMy45MTksOC43MzMtOC43NDEsOC43MzNIMzEuNDU0Yy00LjgyMywwLTguNzM5LTMuOTE2LTguNzM5LTguNzMzdi0xNS4yODVjMC00LjgxNywzLjkxNi04LjcyMiw4LjczOS04LjcyMmgyNjYuMjcxYzQuODIyLDAsOC43NDEsMy45MDQsOC43NDEsOC43MjJWMjEzLjIxNnogTTIyMS43MzYsMjk5LjMxYzEuMTQ5LDkuNDYzLDkuMjk4LDE5LjI2OSwxNi42NzUsMTkuMjY5YzguNDg3LDAsMTYuNTU2LTEwLjMwOSwxNy44MTQtMTkuMjY5YzAuNDg0LTAuMzQ0LDEuMjU5LTEuMTY1LDEuNTU1LTMuMDI3YzAsMCwxLjgwOS02LjQ4OS0wLjYwNC01LjgwNGMwLjg0Ni0yLjQ4OCwzLjYxOC0xMi4yMzUtMS43NjEtMTguMjg4YzAsMC0yLjUxOS0zLjQzOS04LjY0Mi01LjI2N2wtMi44NS0wLjk4N2MtMS4xMzUtMC44MS0zLjQwNC0yLjc0Mi0zLjQwNC00Ljg4MmMwLDAtMS40MTIsMC42NjItMi4yNDYsMS44OGMwLjMyNS0xLjAwNSwwLjg4MS0xLjkyOCwxLjc2Mi0yLjY4NGMwLDAtMC45MjgsMC40ODQtMS43ODUsMS41MjVjLTAuNjYyLDAuMzc4LTIuMTkzLDEuNDA2LTIuNjk1LDMuMjYybDAuMDIzLTAuMTE3YzAsMC0wLjMxMS0wLjQyNi0xLjE1NS0wLjU0NWMtMC44NDMtMC4xMTctMi4zMTQsMC40NDktMi4zMTQsMC40NDlzLTguOTE5LDMuNDg4LTExLjUwNSwxMS41MDNjMCwwLTEuNTM3LDMuNjM1LDAuNDg0LDE0LjI5MmMtMi44NjMtMS4zNTQtMC45MTMsNS42NjItMC45MTMsNS42NjJDMjIwLjQ4MywyOTguMTUxLDIyMS4yNywyOTguOTY2LDIyMS43MzYsMjk5LjMxeiBNMjM3Ljk5MSwyNjIuMTEzYy0wLjQzOCwwLjYwOS0wLjgwNSwxLjM2NS0wLjk4MSwyLjI4MmwtMC4zMTktMC4xMThDMjM2LjkyNywyNjMuNTAyLDIzNy4zNDcsMjYyLjc2MywyMzcuOTkxLDI2Mi4xMTN6IE00NTUuNDQ4LDc1LjQyMWgtMzA5LjM3Yy00Ljc4OCwwLTguNjc0LDMuODg3LTguNjc0LDguNjc0djYyLjcyOGgxNzMuNjE0YzExLjYyLDAsMjEuOTM1LDUuNTY4LDI4LjUwMiwxNC4xNTZoOTAuNDI5djExMi43NmgtMTIuMjE4YzAuNzIxLTE0Ljg1OS02LjEyNC0zMC40NjQtNi4xMjQtMzAuNDY0Yy0yLjMxNi01LjE1NC0xNi40NjEtOS42LTE2LjQ2MS05LjZjLTcuNTQyLTIuNjU5LTcuNjAyLTUuMzA4LTcuNjAyLTUuMzA4Yy0xNC44MjQsMjkuMjE3LTI2LjA5LDAuMDgzLTI2LjA5LDAuMDgzYy0wLjgxNSwzLjExNC0xMC40OTcsNi42NDktMTQuNTI4LDcuOTkxdjY1LjI3MmgxMDguNTE2YzQuNzg3LDAsOC42NzEtMy44ODQsOC42NzEtOC42NzFWODQuMDk2QzQ2NC4xMTksNzkuMzA4LDQ2MC4yMzUsNzUuNDIxLDQ1NS40NDgsNzUuNDIxeiBNNDQxLjg4OSwxMjcuMzcyYzAsNC43ODgtMy44OSw4LjY3NC04LjY3Nyw4LjY3NEgxNjguNjU1Yy00Ljc4OCwwLTguNjgtMy44ODYtOC42OC04LjY3NHYtMTUuMTg4YzAtNC43ODgsMy44OTMtOC42NjUsOC42OC04LjY2NUg0MzMuMmM0Ljc4NywwLDguNjgzLDMuODc3LDguNjgzLDguNjY1djE1LjE4OEg0NDEuODg5eiBNMzU2LjE3MSwyMDkuODk3YzAuMjk1LDEuODU5LDEuMDc1LDIuNjYzLDEuNTQ5LDMuMDA4YzEuMTQxLDkuNDA3LDkuMjMyLDE5LjE0NiwxNi41NjIsMTkuMTQ2YzguNDI5LDAsMTYuNDUtMTAuMjQxLDE3LjY5Ny0xOS4xNDZjMC40ODQtMC4zNDYsMS4yNTMtMS4xNTUsMS41NDItMy4wMDhjMCwwLDEuODAzLTYuNDQ2LTAuNTkxLTUuNzZjMC44MzMtMi40ODIsMy41ODgtMTIuMTYxLTEuNzQ5LTE4LjE3OGMwLDAtMi41MDctMy40MTQtOC41ODMtNS4yMjhsLTIuODMxLTAuOTgxYy0xLjEyOS0wLjgxLTMuMzgxLTIuNzIyLTMuMzgxLTQuODUzYzAsMC0xLjQwNywwLjY1My0yLjIzNCwxLjg2NWMwLjMxOS0wLjk4NywwLjg3NS0xLjkxNSwxLjc1LTIuNjY2YzAsMC0wLjkyMywwLjQ3OS0xLjc3MywxLjUxM2MtMC42NjIsMC4zNzUtMi4xNzYsMS40MDctMi42ODQsMy4yNDVsMC4wMjktMC4xMjFjMCwwLTAuMzEzLTAuNDE3LTEuMTUyLTAuNTM4Yy0wLjgzNC0wLjEyMS0yLjMsMC40NC0yLjMsMC40NHMtOC44NiwzLjQ2NC0xMS40MjUsMTEuNDM1YzAsMC0xLjUzMSwzLjYwOCwwLjQ4NCwxNC4yMDFDMzU0LjIzMiwyMDIuOTI2LDM1Ni4xNzEsMjA5Ljg5NywzNTYuMTcxLDIwOS44OTd6IE0zNzMuODU1LDE3NS45NTVjLTAuNDI1LDAuNjAxLTAuODA0LDEuMzUxLTAuOTY5LDIuMjdsLTAuMzI1LTAuMTIxQzM3Mi44MDQsMTc3LjMyOSwzNzMuMjE4LDE3Ni41OTYsMzczLjg1NSwxNzUuOTU1eiIvPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48L3N2Zz4=">
		                	
		                		<p>Editar perfil</p>
		                	</a>
	                	</center>
                	</div>
                    @if (Auth::check() && Auth::user()->IsAdmin())
                        @if (Auth::check() && Auth::user()->IsAdmin())
                        <div class="col-md-6">
                        @else
                        <div class="col-md-4">
                        @endif
                        <center>
                            <a href="{{ route('user_list') }}">
                                <img alt="Lista de usuários" style="width: 50%;" src="data:image/png;base64,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">
                                <p>Lista de usuários</p>
                            </a>
                        </center>
                    </div>
                    @endif
                	@if (Auth::check() && Auth::user()->IsAdmin())
                    <div class="col-md-6">
                    @else
                    <div class="col-md-4">
                    @endif
                		<center>
		                	<a href="{{ route('voucher_list_all') }}">
		                    	<img alt="Lista de vouchers" style="width: 50%;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PGc+PHBhdGggZD0iTTQ4MC45ODMsODguNjQ1aC0wLjkzM2MtMTEuNiwwLTQzMS4zMjksMC00NDguMSwwQzE0LjMzMyw4OC42NDUsMCwxMDIuOTc4LDAsMTIwLjU5NXYyNzAuODA5YzAsMTcuNjE3LDE0LjMzMywzMS45NSwzMS45NSwzMS45NWMxNy4xODUsMCw0MzYuOTM0LDAsNDQ4LjEsMGgwLjkzM2MxNy4xMDMsMCwzMS4wMTctMTMuOTE1LDMxLjAxNy0zMS4wMTd2LTAuOTMzVjEyMC41OTV2LTAuOTMzQzUxMiwxMDIuNTYsNDk4LjA4NSw4OC42NDUsNDgwLjk4Myw4OC42NDV6IE0zMDQuMDksMTg0LjY5OGwxMS41NDQsMTEuNTQ0bC0xMS41NDQsMTEuNTQ1Yy0xMC4yMjgsMTAuMjI4LTEwLjIyOSwyNi44NzEsMCwzNy4xMDJsMTEuNTQ0LDExLjU0NGwtMTEuNTQ0LDExLjU0NGMtMTAuMjI4LDEwLjIyOC0xMC4yMjksMjYuODcxLDAsMzcuMTAybDExLjU0NCwxMS41NDRMMzA0LjA5LDMyOC4xN2MtMTAuMjI4LDEwLjIyOC0xMC4yMjksMjYuODcxLDAsMzcuMTAybDExLjU0NCwxMS41NDRjLTEyLjY0MiwxMi42NC0xMi4wMjUsMTEuOTY4LTEzLjEzMiwxMy4yOTJIMzMuMjQ3VjEyMS44OTJoMjY4LjU2NWMxLjQ2LDEuOTA4LDEuMjE1LDEuNTUyLDEzLjgyMywxNC4xNmwtMTEuNTQ1LDExLjU0NUMyOTMuODYxLDE1Ny44MjYsMjkzLjg2MSwxNzQuNDcxLDMwNC4wOSwxODQuNjk4eiBNNDc4Ljc1MywzOTAuMTA5SDM0OC4xNzJjNS45MDQtMTAuMDUyLDQuNTQ3LTIzLjIyNC00LjA3LTMxLjg0NGwtMTEuNTQ0LTExLjU0NGwxMS41NDQtMTEuNTQ0YzEwLjIyOC0xMC4yMjgsMTAuMjI5LTI2Ljg3MiwwLTM3LjEwMmwtMTEuNTQ0LTExLjU0NGwxMS41NDQtMTEuNTQ0YzEwLjIyOC0xMC4yMjgsMTAuMjI5LTI2Ljg3MiwwLTM3LjEwMmwtMTEuNTQ0LTExLjU0NGwxMS41NDQtMTEuNTQ0YzQuOTU1LTQuOTU1LDcuNjg0LTExLjU0Myw3LjY4NC0xOC41NTJjMC03LjAwNy0yLjcyOC0xMy41OTYtNy42ODQtMTguNTUxbC0xMS41NDQtMTEuNTQ0bDExLjU0NS0xMS41NDVjOC44NjctOC44NjksMTAuMDQ2LTIyLjU1OSwzLjUzNy0zMi43MWgxMzEuMTEzVjM5MC4xMDl6Ii8+PC9nPjwvZz48Zz48Zz48cGF0aCBkPSJNMjA1LjAzNCwyNDQuMDQ4Yy0xOC45MzIsMC0zMy40MDksOC4wMTgtMzMuNDA5LDMwLjA2N3YzMS42MjhjMCwyMi4wNDksMTQuNDc3LDMwLjA2NywzMy40MDksMzAuMDY3YzE4LjcwOSwwLDMzLjQwOS04LjAxOCwzMy40MDktMzAuMDY3di0zMS42MjhDMjM4LjQ0MiwyNTIuMDY2LDIyMy43NDMsMjQ0LjA0OCwyMDUuMDM0LDI0NC4wNDh6IE0yMDUuMDM0LDMxNi40MzNjLTYuOTA0LDAtMTAuOTE0LTMuMzQxLTEwLjkxNC0xMC42OXYtMzEuNjI4YzAtNy4zNSw0LjAwOC0xMC42OSwxMC45MTQtMTAuNjljNi45MDQsMCwxMS4xMzcsMy4zNDEsMTEuMTM3LDEwLjY5djMxLjYyOGgwQzIxNi4xNywzMTMuMDkzLDIxMS45MzgsMzE2LjQzMywyMDUuMDM0LDMxNi40MzN6Ii8+PC9nPjwvZz48Zz48Zz48cGF0aCBkPSJNMTkyLjExNSwxNjMuMmMtNC4wMDgsMC03LjU3MywxLjc4MS05LjM1NCw1LjU2OGwtNzguMTc1LDE2MC41ODRjLTAuNjY4LDEuMzM2LTEuMTE0LDIuODk1LTEuMTE0LDQuMjMxYzAsNS41NjgsNC44OTksMTEuODA0LDEyLjQ3MiwxMS44MDRjNC4yMzIsMCw4LjQ2NC0yLjIyOCwxMC4wMjMtNS41NjhsNzguMzk5LTE2MC41ODRjMC42NjgtMS4zMzUsMC44OS0yLjg5NSwwLjg5LTQuMjMxQzIwNS4yNTUsMTY3Ljg3NywxOTguMzUxLDE2My4yLDE5Mi4xMTUsMTYzLjJ6Ii8+PC9nPjwvZz48Zz48Zz48cGF0aCBkPSJNMTAyLjgwMywxNzIuMzMyYy0xOC45MzIsMC0zMy40MDksOC4wMTgtMzMuNDA5LDMwLjA2N3YzMS42MjdjMCwyMi4wNDksMTQuNDc3LDMwLjA2OCwzMy40MDksMzAuMDY4YzE4LjcwOSwwLDMzLjQwOS04LjAxOSwzMy40MDktMzAuMDY4di0zMS42MjdDMTM2LjIxMiwxODAuMzUsMTIxLjUxMiwxNzIuMzMyLDEwMi44MDMsMTcyLjMzMnogTTExMy45NCwyMzQuMDI2YzAsNy4zNS00LjIzMSwxMC42OTEtMTEuMTM3LDEwLjY5MWMtNi45MDQsMC0xMC45MTQtMy4zNDEtMTAuOTE0LTEwLjY5MXYtMzEuNjI3YzAtNy4zNSw0LjAxLTEwLjY5LDEwLjkxNC0xMC42OXMxMS4xMzcsMy4zNDEsMTEuMTM3LDEwLjY5VjIzNC4wMjZ6Ii8+PC9nPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48L3N2Zz4=">
		                    	<p>Vouchers</p>
		                    </a>
	                    </center>
                	</div>
                    @if (Auth::check() && Auth::user()->IsAdmin())
                    <div class="col-md-6">
                    @else
                    <div class="col-md-4">
                    @endif
                        <center>
                            <a href="{{ route('voucher_list_keys') }}">
                                <img alt="Lista de chaves de usuario" style="width: 50%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAMAAABrrFhUAAACMVBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACad/teAAAAunRSTlMAAQIDBAUGBwgJCgsMDg8QERITFBUWFxkaGxweHyAhIiMkJSYnKC8wMTIzNTg5Ojs8PT4/QEJDR0hJSktMTU5PUFRVVldYWVtdXl9gYWNlZ2lqa2xtbm9wcXN0dnd4eXp7fICBgoaHiYuMjY6PkJGSlZaXmJmam5yjpaeoqayusLGys7S2t7i5uru8vb7Cw8TFx8jKy8zNzs/Q0dPU1dbX2drb3OLk5ebn6Onq6+zt8PHy8/f4+fr7/P3WJL5EAAAE6klEQVR4Ae3c+1dU1RvH8c93lMGvlxzN7gJeyozMC5WVwoxIFxM0w5mxtBHN8oKa4YRWZoEJSZGXLjMDkSmFzUBiwozA89flglGZc84sx+Vurd3Zn9ef8F7np+d59gERERERERERERERERGRqaYvXbtx+97Dh1zm8N7tG9c+MwN3Ma/640tpca30pab185DfE/uT4nqpA/PhbHakT4xwpcEHByt/EWP0VMDmzb/FIEMbYfG+GGYPcuwX4zRiki1ioHrc9tKwGCj9CrIWJMVIqUWY8LkY6gTGrRwRQ42uwk2eDjHWdx4Aa8RglQA+EYMdA6ZcFoP1TsWSMTHY2NMIitHCaBKjRdEiRmtBTIwWw4AYbQBiOAZgAMMxAAMYjgEYwGwMwAAMwAAMwAAMwAAMwAAMwAAMwAAMwAAMwAAMwAAMwACpg7X+gMv4axuThQa48BRc6cnzhQVIlsKlSpIFBTgA19pfUIANcK03CgpQBdeqLChAAK7lv8cADMAADMAADMAADMAADMAADFBSHQpOCG1ahjyWbQoF9RCqLlUbYMdfcsdI20I4WNh2Q/RxNaIywLuSq8sHG19c9PKeugCl18ViF2x2imaGypQFqBarNticFt3UKAsQEquEFxZFcdHNtn8xQJdZAYKFfAEx0U1YRQAGYAAGYAAGCItVtz1AQnTzjrIAm8TqvAcWnrOim83KAiwTq+OwaRbdrFAWwNsuuW6sgM3yjOilo1hZAJTEZLJMEA7q06KTRBnUBcADO08lsrrPRSvgaFX0XHdCD11fN/hUzwS9WcUe5OUp9mqCQ1EFARiAARiAARiAARiAARiAARiAARiAARigKMvrQV7/8xZpQnWAWZHWeDw2LnG2aSUcrWj6PhHTQjzeGpmtMsD8n2SydD0cbBkWncRK1QXwtkmuzH9hLH7Ga/piZDm4GuNylOtx9QEYgAEYgAEYoMuoADyWrhardrPO5e0PJnbDpsHFDyawXXJ1z4GNr0v0EoG6AIhclTtGvlkMB4vaR0Qfgw1QGQBl68NZ2zYvRx7Pbd4W1kRNGYeiDMAADMAADMAADMAADMAADMAADMAADMAA9xfg/+UB/4TA6seRx2OrA349BMqnqw1QczEjt12LzoWDOdFroo3Mb6+rDLBBcnVMg03xGdFLnboAjyTFIgibetFM/6PKAgTE6hRsWkQ365QF2CpW8SJYTP1ZdBPij5R4H8AADMAADMAAvBW+7wBvidUPU2DhuSC62aIswAti9RlsPhXdvKgswIwfxaISNmtEM7GZygJg6R+SYy8cfCha6XsW6gJgQXPP4C19ba/B0aun+wZ10XNskeKZ4DTfLbOQ1yyfLqZxKMoADMAADMAADMAADMAADHCvAfxwraqCAqwz6wsYEKutcK23xWoAMbFqhWt9JVYxtIhNHVyqVmxacVRshnc/CBeau2tYbKIIioNU58kvXeZkZ0ochLFkTAw2thRTesVgv08FmsVgxwGsFYNVAvB8K8bq9OCmVaNiqNEKjDshhvoCExamxEj9i5H1cloMlFljv/M1ylZM0ijGOYQce8QwH8Ci9roYZKgONhW/ijEuPg8HvoYrYoQ/d82Bs/mNKXG9/oMlyO+hmqOXM+Jamd5ozcO4ixnlVXU79h35yGWO7NtRV1U+E0RERERERERERERERESG+gcy451jiDQmagAAAABJRU5ErkJggg==">
                            
                                <p>Chaves de vouchers</p>
                            </a>
                        </center>
                    </div>

            	</div>
        	</div>
    	</div>
	</div>
</div>
@endsection
