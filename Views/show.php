<p>
	<a href="http://localhost/blog1/index.php?page=accueil">Liste des articles</a>
</p>

<!-- Affichage de l'article -->
<h2>
	<?= $article->titre() ?>
</h2>

<em> <?= $article->dateAjout()?></em>
<p>
	<?= nl2br($article->contenu()) ?>
</p>



<!-- Affichage des commentaires -->
<h1>Liste des commmentaires :</h1>

<!-- 1er niveau de commentaire (commentaires principaux) -->
<?php foreach ($firstLevelComments as $comment) : ?>

		<p>
			<?= $comment['auteur'] ?>
			<em>
				<?= $comment['datePubli'] ?>
			</em>
		</p>
		
		<p>
			<?= $comment['commentaire'] ?>

			<!-- Signaler un commentaire -->		
			<a href="index.php?page=reportComment&idArticle=<?=$article->id()?>&id=<?=$comment['id']?>&report=<?=$comment['signalement']?>">Signaler</a>
			
		</p>

				<!-- script pour afficher les reponses via un bouton -->
				<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Repondre</button>

				<div id="demo" class="collapse">
					<form action="http://localhost/blog1/index.php?page=addResponse&article=<?=$article->id()?>&parent=<?=$comment['id']?>" method="post">
							<label for="pseudo">Pseudo</label>
							<input type="text" name="pseudo" /> <br />
							<label for="commentaire">Commentaire</label>
							<textarea name="commentaire" rows="" cols=""></textarea>
							<input type="submit" value='repondre'/>
					</form>
				</div>





	<!-- 2ème niveau de commentaire (réponses aux commentaires principaux) -->
	<?php foreach ($secondLevelComments as $reponse) : ?>
		
		<?php if ($reponse['parent'] === $comment['id']) : ?>
			
			<p style="margin-left: 40px;">
				<?= $reponse['auteur'] ?>
				<em>
					<?= $reponse['datePubli'] ?>
				</em>					
			</p>

			<p style="margin-left: 40px;">
				
				<?= $reponse['commentaire'] ?>

				<!-- Signaler un commentaire -->		
				<a href="index.php?page=reportComment&idArticle=<?=$article->id()?>&id=<?=$reponse['id']?>&report=<?=$reponse['signalement']?>">Signaler</a>
			</p>

		


			<!-- 3ème niveau de commentaire (réponses aux commentaires des commentaires principaux) -->
			<?php foreach ($thirdLevelComments as $reponse2) : ?>
				<?php if ($reponse2['parent'] === $reponse['id']) : ?>

					<p style="margin-left: 80px;">
						<?= $reponse2['auteur'] ?>
						<em>
							<?= $reponse2['datePubli'] ?>
						</em>				
					</p>

					<p style="margin-left: 80px;">
						
						<?= $reponse2['commentaire'] ?>

						<!-- Signaler un commentaire -->		
						<a href="index.php?page=reportComment&idArticle=<?=$article->id()?>&id=<?=$reponse2['id']?>&report=<?=$reponse2['signalement']?>">Signaler</a>
					</p>



					<!-- 4ème niveau de commenaite (réponses aux reponses des reponses des commentaires principaux) -->
					<?php foreach ($fourthLevelComments as $reponse3) : ?>
						<?php if ($reponse3['parent'] === $reponse2['id']) : ?>
							
							<p style="margin-left: 120px;">
								<?= $reponse3['auteur'] ?>
								<em>
									<?= $reponse3['datePubli'] ?>
								</em>				
							</p>

							<p style="margin-left: 120px;">
								
								<?= $reponse3['commentaire'] ?>

								<!-- Signaler un commentaire -->		
								<a href="index.php?page=reportComment&idArticle=<?=$article->id()?>&id=<?=$reponse3['id']?>&report=<?=$reponse3['signalement']?>">Signaler</a>
							</p>
						<?php endif; ?>
					<?php endforeach; ?>							
				<?php endif; ?>
			<?php endforeach; ?>					
		<?php endif; ?>			
	<?php endforeach; ?>
<?php endforeach; ?>





<!-- Ajouter un commentaire -->
<h2>Ajouter un commentaire</h2>

<form action="http://localhost/blog1/index.php?page=addComment&id=<?=$_GET['id']?>" method="post">
	<label for="pseudo">Pseudo</label>
	<input type="text" name="pseudo" /> <br />
	<label for="commentaire">Commentaire</label>
	<textarea name="commentaire" rows="7" cols="50"></textarea>

	<input type="submit" value='commenter'/>

</form>




