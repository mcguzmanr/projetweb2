<?php
/**
 * @file     ModeleCommentaireJeux.php
 * @author   Guilherme Tosin, Marcelo Guzmán
 * @version  1.0
 * @date     
 * @brief    Modèle Commentaire
 *
 * @details  Fonctions "CRUD" pour la table  
 */

	class ModeleCommentaireJeux extends BaseDAO {

        // Déclaration du nom de la table (fonction abstraite)
		public function lireNomTable() {
			return "commentaire_jeux";
        }

        public function lireCommentaireParJeuxId($id) {
            $resultat = $this->lire($id, "jeux_id");
            return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'CommentaireJeux');
        }

        public function toutObtenirParIdJeuxId($id){
            $sql = "SELECT * FROM  membre m JOIN " . $this->lireNomTable() . " cj ON cj.membre_id = m.membre_id WHERE jeux_id = " . $id; 
            $resultat = $this->requete($sql);
            return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "CommentaireJeux");
        }
        
    }