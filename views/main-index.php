<div class="columns is-full-height">
	<div class="column is-5 joinDescription">
		<div class="content">
			<div class="level">
				<div class="level-left">
					<img class="level-item" src="assets/images/logo.svg" alt="Logo image">
					<h1 class="level-item" class="title">DatSocialMedia</h1>
				</div>
			</div>
			<p>Venez discuter et partager des moments inédits.</p>
			<ul>
				<li>
					<span><i class="fas fa-search"></i></span>
					<span>Faire des recherches dans le monde</span>
				</li>
				<li>
					<span><i class="fas fa-lock"></i></span>
					<span>Protéger vos postes</span>
				</li>
				<li>
					<span><i class="fas fa-comment-alt"></i></span>
					<span>Discuter avec ses amis</span>
				</li>
				<li>
					<span><i class="fas fa-user-friends"></i></span>
					<span>Inviter vos amis</span>
				</li>
				<li>
					<span><i class="fas fa-share-alt"></i></span>
					<span>Partager vos postes</span>
				</li>
			</ul>
		</div>
		<div class="middle-logo">
			<img src="assets/images/logo.svg" alt="Logo image">
		</div>
	</div>
	<div class="column has-text-centered signin">
		<div class="section is-full-height">
			<div class="level">
				<div class="signinSection thingSection level-item <?php echo ($section === 'signin' ? 'is-active' : ''); ?>">
					<a href="/signin">Se connecter</a>
					<div class="line"></div>
				</div>
				<div class="signupSection thingSection level-item <?php echo ($section === 'signup' ? 'is-active' : ''); ?>">
					<a href="/signup">S'inscrire</a>
					<div class="line"></div>
				</div>
			</div>
			<?php if ($error) echo $error; ?>
			<div class="content is-full-height">
				<?php if ($section === 'signin') { ?>
					<form action="/signin" method="post">
						<div class="field">
							<div class="control">
								<input type="text" class="input" name="login" placeholder="Pseudo" />
							</div>
						</div>
						<div class="field">
							<div class="control">
								<input type="password" class="input" name="password" placeholder="Mot de passe" />
							</div>
						</div>
						<a href="" class="forgot_password">Mot de passe oublié ?</a>
						<button class="signinButton button">Se connecter</button>
						<p class="signupText">Nouveau sur DatSocialMedia ? <a href="/signup">Inscrivez vous maintenant</a></p>
					</form>
				<?php } else if ($section === 'signup') { ?>
					<form action="/signup" method="post">
						<div class="field">
							<div class="control">
								<input type="text" class="input" name="login" placeholder="Pseudo" />
							</div>
						</div>
						<div class="field">
							<div class="control">
								<input type="text" class="input" name="email" placeholder="Email" />
							</div>
						</div>
						<div class="field">
							<div class="control">
								<input type="password" class="input" name="password" placeholder="Mot de passe" />
							</div>
						</div>
						<div class="field">
							<div class="control">
								<input type="password" class="input" name="confirm_password" placeholder="Confirmez votre mot de passe" />
							</div>
						</div>
						<button class="signinButton button">S'inscrire</button>
					</form>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
