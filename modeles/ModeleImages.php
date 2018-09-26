<?php
/**
 * @file     ModeleImages.php
 * @author   Guilherme Tosin, Marcelo Guzmán
 * @version  1.0
 * @date     
 * @brief    Modèle Images
 *
 * @details  Fonctions "CRUD" pour la table  
 */

	class ModeleImages extends BaseDAO {

        // Déclaration du nom de la table (fonction abstraite)
		public function lireNomTable() {
			return "photo_jeux";
        }
        
//		 public function toutesImages() {
//             $sql = "SELECT chemin_photo FROM " . $this->lireNomTable();
//		 	$resultat = $this->requete($sql);
//		 	return $resultat->fetchAll(PDO::FETCH_ASSOC);
//         }


        public function toutesImages() {
            $resultat = $this->lireTous();
            return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Images');
        }
        
        public function lireImageParId($idImage) {
            $resultat = $this->lire($idImage);
            $resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Images');
            return $resultat->fetch();
        }

        public function lireImagesParJeuxId($id) {
            $resultat = $this->lire($id, "jeux_id");
            // $resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Images');
            return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Images');
        }

        public function lireDerniersImages($nombreImages = 9) {
            $sql = "SELECT * FROM " . $this->lireNomTable() . " WHERE photo_jeux_id = jeux_id ORDER BY jeux_id DESC LIMIT " . $nombreImages;
            $resultat = $this->requete($sql);
            return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Images");
        }


        
    }