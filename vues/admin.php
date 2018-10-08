<?php
//var_dump($donnees);
//var_dump($donnees['membres']);
//var_dump($donnees);



if ($_SESSION["type"] == 3 || $_SESSION["type"] == 2) : ?>
    <h1 class="text-center my-3">Adminstration: gestion des membres</h1>
    <div class="d-flex container">

        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
               aria-controls="v-pills-home" aria-selected="true">Afficher les membres</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
               aria-controls="v-pills-profile" aria-selected="false">Afficher les locations</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
               aria-controls="v-pills-messages" aria-selected="false">Afficher les achats</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
               aria-controls="v-pills-settings" aria-selected="false">Afficher les messageries </a>
        </div>

        <div class="tab-content" id="v-pills-tabContent">
            <!--Tableau affichage les membres-->
            <div class="tab-pane fade show active  table-responsive" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <table class="table table-hover ">
                    <thead class="thead-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Courriel</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Type</th>
                        <th class="text-center" colspan="3" scope="col">Opération</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($donnees['membres'] as $membre) : ?>
                        <tr>
                            <td><?= $membre->getMembreId(); ?></td>
                            <td><?= ($_SESSION["type"] == 3 || ($_SESSION["type"] == 2 && $membre->getTypeUtilisateur() == 1) || $_SESSION["id"] == $membre->getMembreId() ? '<a href="index.php?Membres&action=afficherMembre&membre_id=' . $membre->getMembreId() . '">' . $membre->getCourriel() . '</a>' : $membre->getCourriel()) ?></td>
                            <td><?= $membre->getPrenom() . ' ' . $membre->getNom(); ?></td>

                            <td><?php
                                $modeleMembres = $this->lireDAO("Membres");
                                $modeleMembres->obtenirRole($membre->getTypeUtilisateur());
                                ?>
                            </td>

                            <?php if (!$membre->getMembreValide()) : ?>
                                <td>
                                    <a href="index.php?Admin&action=validerMembre&membre_id=<?= $membre->getMembreId(); ?>"
                                       class="mr-2">Valider</a></td>
                            <?php endif; ?>

                            <?php if ($membre->getMembreValide() && $membre->getTypeUtilisateur() != 3 && $membre->getMembreActif() && ($_SESSION["type"] == 3 || ($_SESSION["type"] == 2 && $membre->getTypeUtilisateur() == 1))) : ?>
                                <td>
                                    <a href="index.php?Admin&action=bannirMembre&membre_id=<?= $membre->getMembreId(); ?>">Bannir</a>
                                </td>
                            <?php endif; ?>

                            <?php if ($membre->getTypeUtilisateur() == 1 && $_SESSION["type"] == 3 && $membre->getMembreActif() && $membre->getMembreValide()) : ?>
                                <td>
                                    <a href="index.php?Admin&action=promouvoirMembre&membre_id=<?= $membre->getMembreId(); ?>">Promouvoir</a>
                                </td>
                            <?php endif; ?>

                            <?php if (!$membre->getMembreActif()) : ?>
                                <td>
                                    <a href="index.php?Admin&action=reactiverMembre&membre_id=<?= $membre->getMembreId(); ?>"
                                       class="mr-2">Dé-bannir</a></td>
                            <?php endif; ?>

                            <?php if ($_SESSION["type"] == 3 && $membre->getTypeUtilisateur() == 2) : ?>
                                <td>
                                    <a href="index.php?Admin&action=demouvoirMembre&membre_id=<?= $membre->getMembreId(); ?>"
                                       class="mr-2">Limoger</a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            <!--Tableau affichage les locations-->
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <table class="table table-hover ">
                    <thead class="thead-primary">
                    <tr>
                        <th scope="col">ID location</th>
                        <th scope="col">Titre jeux</th>
                        <th scope="col">Locataire</th>
                        <th scope="col">Type de paiement</th>
                        <th scope="col">Date début</th>
                        <th scope="col">Date retour</th>
                        <th class="text-center" colspan="3" scope="col">Opération</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($donnees['location'] as $location) : ?>
                        <tr>
                            <td><?= $location->getIdLocation() ?></td>
                            <td><?= $location->titre; ?></td>
                            <td><?= $location->courriel ?></td>
                            <td><?= $location->type_paiement ?></td>
                            <td><?= $location->getDateDebut() ?></td>
                            <td><?= $location->getDateFin() ?></td>
                            <td><a href="#">Modifier</a></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            <!--Tableau affichage les achats-->
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

            </div>

            <!--Tableau affichage les messageries-->
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

            </div>
        </div>

    </div>

<?php else : ?>
    <h3 class='text-center my-5'>Vous n`avez pas droit d`acceder à cette page!!!</h3>
<?php endif; ?>