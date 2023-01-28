<header class="header">
        <div class="wrapper">
                <a href="/">LR</a>
                <nav class="nav">
			<?php
				if (auth()->check()) {
					?>
					<a href="/profile.php">Профиль</a>
					<form action="app/Actions/logout.php" method="post">
						<button type="submit">Выйти</button>
					</form>
					<?php
				} else {
					?>
					<a href="/index.php">Войти</a>
                        		<a href="/register.php">Создать аккаунт</a>
					<?php
				}
			?>
                </nav>
        </div>
</header>
