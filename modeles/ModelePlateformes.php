<?php
/**
 * @file     ModelePlateformes.php
 * @author   
 * @version  1.0
 * @date     
 * @brief    Modèle Plateformes
 *
 * @details  Fonctions "CRUD" pour la table  
 */

	class ModelePlateformes extends BaseDAO {

        // Déclaration du nom de la table (fonction abstraite)
		public function lireNomTable() {
			return "plateforme";
        }
               
        public function lirePlateformeParId($id) {
            $resultat = $this->lire($id);
            $resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Plateformes');
            return $resultat->fetch();
        }

        public function lireToutesPlateformes() {
            $resultat = $this->lireTous();
            return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Plateformes');
        }

        public function sauvegarder(Plateformes $unPlateforme)
        {
            $donnees = array(
                $unPlateforme->getPlateforme(),
                $unPlateforme->getPlateformeId()
            );

            if($unPlateforme->getPlateformeId() && $this->lire($unPlateforme->getPlateformeId())->fetch())
            {
                $sql = "UPDATE " . $this->lireNomTable() . " SET plateforme=? WHERE plateforme_id=?";
            }
            else
            {
                $id = array_pop($donnees);
                $sql = "INSERT INTO " . $this->lireNomTable() . " (plateforme) VALUES (?)";
            }
            $this->requete($sql, $donnees);
        }
    }