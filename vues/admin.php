<?php
//var_dump($donnees);
//var_dump($donnees['membres']);
//var_dump($donnees);


if ($_SESSION["type"] == 3 || $_SESSION["type"] == 2) : ?>
    <h1 class="text-center my-3">Adminstration: gestion des membres</h1>
    <div class="d-flex container">

        <div class="nav flex-column nav-pills m-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
               aria-controls="v-pills-home" aria-selected="true">Gérer les membres</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
               aria-controls="v-pills-profile" aria-selected="false">Gérer les jeux</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
               aria-controls="v-pills-messages" aria-selected="false">Gérer les transactions</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
               aria-controls="v-pills-settings" aria-selected="false">Gérer les menus</a>
        </div>

        <div class="tab-content" id="v-pills-tabContent m-1">
            <!--Tableau gérer les membres-->
            <div class="tab-pane fade show active  table-responsive" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <table class="table table-hover ">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Courriel</th>
                        <th scope="col">Type</th>
                        <th class="text-center" colspan="3" scope="col">Opération</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($donnees['membres'] as $membre) {
                        if ($membre->getTypeUtilisateur() != 3 || ($membre->getTypeUtilisateur() == 3 && $_SESSION["type"] == 3)) { ?>
                            <tr class="<?= $membre->getMembreActif() ? "" : "text-danger" ?> <?= $membre->getTypeUtilisateur() == 1 ? "" : "text-success" ?>">
                                <td><?= $membre->getMembreId(); ?></td>
                                <td><?= ($_SESSION["type"] == 3 || ($_SESSION["type"] == 2 && $membre->getTypeUtilisateur() == 1) || $_SESSION["id"] == $membre->getMembreId() ? '<a href="index.php?Membres&action=formModifierMembre&membreId=' . $membre->getMembreId() . '">' . $membre->getPrenom() . ' ' . $membre->getNom() . '</a>' : $membre->getPrenom() . ' ' . $membre->getNom()) ?></td>
                                <td><?= $membre->getCourriel() ?></td>
                                <td><?php
                                    $modeleMembres = $this->lireDAO("Membres");
                                    $modeleMembres->obtenirRole($membre->getTypeUtilisateur());
                                    ?>
                                </td>
                                <?php if (!$membre->getMembreValide()) { ?>
                                    <td>
                                        <a href="index.php?Admin&action=validerMembre&membre_id=<?= $membre->getMembreId(); ?>"
                                           class="btn btn-outline-success m-1">Valider</a></td>
                                <?php }
                                if ($membre->getMembreValide() && $membre->getTypeUtilisateur() != 3 && $membre->getMembreActif() && ($_SESSION["type"] == 3 || ($_SESSION["type"] == 2 && $membre->getTypeUtilisateur() == 1))) { ?>
                                    <td>
                                        <a href="index.php?Admin&action=bannirMembre&membre_id=<?= $membre->getMembreId(); ?>"
                                           class="btn btn-outline-danger m-1">Bannir</a></td>
                                <?php }
                                if (!$membre->getMembreActif()) { ?>
                                    <td>
                                        <a href="index.php?Admin&action=reactiverMembre&membre_id=<?= $membre->getMembreId(); ?>"
                                           class="btn btn-outline-warning m-1">Dé-bannir</a></td>
                                <?php }
                                if ($membre->getTypeUtilisateur() == 1 && $_SESSION["type"] == 3 && $membre->getMembreActif() && $membre->getMembreValide()) { ?>
                                    <td>
                                        <a href="index.php?Admin&action=promouvoirMembre&membre_id=<?= $membre->getMembreId(); ?>"
                                           class="btn btn-outline-primary m-1">Promouvoir</a></td>
                                <?php }
                                if ($_SESSION["type"] == 3 && $membre->getTypeUtilisateur() == 2) { ?>
                                    <td>
                                        <a href="index.php?Admin&action=demouvoirMembre&membre_id=<?= $membre->getMembreId(); ?>"
                                           class="btn btn-outline-info m-1">Rétrograder</a></td>
                                <?php } ?>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>

            <!--Tableau gérer les jeux-->
            <div class="tab-pane fade show active  table-responsive" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <table class="table table-hover ">
                    <thead class="thead-primary">
                    <tr>
                        <th scope="col">ID jeu</th>
                        <th scope="col">Titre jeux</th>
                        <th scope="col">Image</th>
                        <th scope="col">Propriétaire</th>
                        <th scope="col">Date d`ajout</th>
                        <th class="text-center" colspan="2" scope="col">Opération</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php for ($i = 0; $i < count($donnees['jeux']); $i++)  : ?>
                        <tr>
                            <td><?= $donnees['jeux'][$i]->getJeuxId() ?></td>
                            <td>
                                <a href='index.php?Jeux&action=formModifierJeux&JeuxId=<?= $donnees['jeux'][$i]->getJeuxId() ?>'><?= $donnees['jeux'][$i]->getTitre() ?></a>
                            </td>
                            <td><img src="<?= $donnees['images'][$i]->getCheminPhoto(); ?>" class="img-thumbnail"></td>
                            <td><?= $donnees['membreJeu'][$i]->getPrenom() . ' ' . $donnees['membreJeu'][$i]->getNom() ?></td>


                            <td><?= $donnees['jeux'][$i]->getDateAjout(); ?> </td>

                            <?php if (!$donnees['jeux'][$i]->getJeuxValide()) { ?>
                                <td>
                                    <a href="index.php?Admin&action=validerJeu&jeux_id=<?= $donnees['jeux'][$i]->getJeuxId(); ?>"
                                       class="btn btn-outline-success m-1">Valider</a>
                                </td>
                            <?php }
                            if ($donnees['jeux'][$i]->getJeuxActif() ) { ?>
                                <td>
                                    <a href="index.php?Admin&action=bannirJeu&jeux_id=<?= $donnees['jeux'][$i]->getJeuxId(); ?>"
                                       class="btn btn-outline-danger m-1">Bannir</a>
                                </td>
                            <?php }
                            else { ?>
                                <td>
                                    <a href="index.php?Admin&action=reactiverJeu&jeux_id=<?= $donnees['jeux'][$i]->getJeuxId(); ?>"
                                       class="btn btn-outline-warning m-1">Dé-bannir</a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php endfor; ?>

                    </tbody>
                </table>
            </div>

            <!--Tableau gérer les transactions-->
            <div class="tab-pane fade show active  table-responsive" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <!--Tableau de location-->
               <h2 class="text-center">Locations</h2>
                <table class="table table-hover ">
                    <thead class="thead-primary">
                    <tr>
                        <th scope="col">ID location</th>
                        <th scope="col">Titre jeux</th>
                        <th scope="col">Propriétaire</th>
                        <th scope="col">Locataire</th>
                        <th scope="col">Paiement</th>
                        <th scope="col">Date début</th>
                        <th scope="col">Date retour</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php for ($i = 0; $i < count($donnees['locations']); $i++)  : ?>
                        <tr>
                            <td><?= $donnees['locations'][$i]->getLocationId() ?></td>
                            <td>
                                <a href='index.php?Jeux&action=formModifierJeux&JeuxId=<?= $donnees['jeuLocation'][$i]->getJeuxId() ?>'><?= $donnees['jeuLocation'][$i]->getTitre() ?></a>
                            </td>
                            <td><?= $donnees['proprietaireJeuLocation'][$i]->getPrenom() . ' ' . $donnees['membreJeu'][$i]->getNom() ?></td>
                            <td><?= $donnees['membreLocation'][$i]->getPrenom() . ' ' . $donnees['membreJeu'][$i]->getNom() ?></td>
                            <td><?= $donnees['typePaiementLocation'][$i]->getTypePaiement() ?> </td>
                            <td><?= $donnees['locations'][$i]->getDateDebut(); ?> </td>
                            <td><?= $donnees['locations'][$i]->getDateRetour(); ?> </td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
                <!--Tableau d`achat-->
                <h2 class="text-center">Achats</h2>
                <table class="table table-hover ">
                    <thead class="thead-primary">
                    <tr>
                        <th scope="col">ID location</th>
                        <th scope="col">Titre jeux</th>
                        <th scope="col">Propriétaire</th>
                        <th scope="col">Acheteur</th>
                        <th scope="col">Paiement</th>
                        <th scope="col">Date d`achat</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php for ($i = 0; $i < count($donnees['achats']); $i++)  : ?>
                        <tr>
                            <td><?= $donnees['achats'][$i]->getMembreId() ?></td>
                            <td>
                                <a href='index.php?Jeux&action=formModifierJeux&JeuxId=<?= $donnees['jeuLocation'][$i]->getJeuxId() ?>'><?= $donnees['jeuLocation'][$i]->getTitre() ?></a>
                            </td>
                            <td><?= $donnees['proprietaireJeuAchat'][$i]->getPrenom() . ' ' . $donnees['membreJeu'][$i]->getNom() ?></td>
                            <td><?= $donnees['membreAchat'][$i]->getPrenom() . ' ' . $donnees['membreJeu'][$i]->getNom() ?></td>
                            <td><?= $donnees['typePaiementLocation'][$i]->getTypePaiement() ?> </td>
                            <td><?= $donnees['achats'][$i]->getDateAchat(); ?> </td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>

            <!--Tableau gérer les menus-->
            <div class="tab-pane fade show active  table-responsive" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

            </div>
        </div>

    </div>

<?php else : ?>
    <h3 class='text-center my-5'>Vous n`avez pas droit d`acceder à cette page!!!</h3>
<?php endif; ?>