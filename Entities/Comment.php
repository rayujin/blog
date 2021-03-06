<?php

class Comment
{
	public $id;
	protected $parent;
	protected $article;
	protected $titre;
	protected $auteur;
	protected $commentaire;
	protected $datePubli;
	protected $signalement;

	const AUTEUR_INVALIDE = "Auteur invalide, entrer un nouveau pseudo !";
	const CONTENU_INVALIDE = "Contenu invalide, veuillez réessayer !";

	public function isValid()
	{
		return !(empty($this->auteur) || empty($this->contenu));
	}

	
	// SETTERS //

	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function setParent($parent)
	{
		$this->parent = (int) $parent;
	}

	public function setArticle($article)
	{
		$this->article = (int) $article;
	}

	public function setTitre($titre)
	{
		$this->$titre = $titre;
	}
	

	public function setAuteur($auteur)
	{
		if (!is_string($auteur) || empty($auteur))
		{
			return self::AUTEUR_INVALIDE;
		}

		$this->auteur = $auteur;
	}

	public function setCommentaire($commentaire)
	{
		if (!is_string($commentaire) || empty($commentaire))
		{
			return self::CONTENU_INVALIDE;
		}

		$this->commentaire = $commentaire;
	}

	public function setDatePubli($datePubli)
	{
		$this->datePubli = $datePubli;
	}
	
	public function setSignalement($signalement)
	{
		$this->signalement = $signalement;
	}

	
	// GETTERS //

	public function id()
	{
		return $this->id;
	}

	public function parent()
	{
		return $this->parent;
	}

	public function article()
	{
		return $this->article;
	}

	public function titre()
	{
		return $this->titre;
	}

	public function auteur()
	{
		return $this->auteur;
	}

	public function commentaire()
	{
		return $this->commentaire;
	}

	public function datePubli()
	{
		return $this->datePubli;
	}
	
	public function signalement()
	{
		return $this->signalement;
	}

}

