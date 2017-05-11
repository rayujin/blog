<?php

class ArticlesController extends Controller
{
	// Affiche la liste des articles
	public function executeAccueil()
	{
		// on récupère la liste des articles
		$db = PDOFactory::getMysqlConnexion();
		$objetArticle = new ArticlesManager($db);
		$listeArticles = $objetArticle->getListArticles();		

		// On require la vue 
		$this->render('accueil', compact('listeArticles'));
	}



	//Affiche l'article et ses commentaires 
	public function executeShow()
	{

		$db = PDOFactory::getMysqlConnexion();

		if(isset($_GET['id']))
		{
			//Récupération de l'article
			$objetArticle = new ArticlesManager($db);
			$article = $objetArticle->getUniqueArticle((int) $_GET['id']);

			//Récupération des commentaires
			$objetCommentaire = new CommentsManager($db);
			$listeComments = $objetCommentaire->getListComments($_GET['id']);


			$firstLevelComments = [];
			$secondLevelComments = [];
			$thirdLevelComments = [];
			$fourthLevelComments = [];
			//Trie des commentaires
			for ($comment = 0; $comment < count($listeComments); $comment++ )
			{
				// Tableau représentant les commentaires principaux (1er niveau)
				if($listeComments[$comment]['parent'] === NULL)
				{
					$firstLevelComments[] = $listeComments[$comment]; 
				}
				
				//Tableau représentant les reponses aux commentaires principaux (2ème niveau)	
				for ($reponse = 0; $reponse < count($firstLevelComments); $reponse++)
				{
			
					if($listeComments[$comment]['parent'] === $firstLevelComments[$reponse]['id'])
					{
						$secondLevelComments[] = $listeComments[$comment];
					}		
				}


				//Tableau représentant les reponses aux reponses des commentaires principaux (3ème niveaux)
				for ($reponse2 = 0; $reponse2 < count($secondLevelComments); $reponse2++)
				{
					if($listeComments[$comment]['parent'] === $secondLevelComments[$reponse2]['id'])
					{
						$thirdLevelComments[] = $listeComments[$comment];
					}
				}


				//Tableau représentant les reponses aux reponses des reponses des commentaires principaux (4ème niveaux)
				for ($reponse3 = 0; $reponse3 < count($thirdLevelComments); $reponse3++)
				{
					if($listeComments[$comment]['parent'] === $thirdLevelComments[$reponse3]['id'])
					{
						$fourthLevelComments[] = $listeComments[$comment];
					}
				}
			}


			//Affichage de l'article et des commentaires
			$this->render('show', compact('article','listeComments', 'firstLevelComments', 'secondLevelComments', 'thirdLevelComments', 'fourthLevelComments'));	
			
		}
	}















}








