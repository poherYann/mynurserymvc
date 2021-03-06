<?php
if (!empty($_SESSION)) {
    if (!empty($_SESSION['login'])) {
        if ($_SESSION['login']['user'] === "particulier") {


            if ($enfant[0]->sexe == 'garçon') {
                $titleColor = 'rgba(155, 193, 188, 0.8)';
            } elseif ($enfant[0]->sexe == 'non-genré') {
                $titleColor = 'rgba(237, 106, 90, 0.5)';
            } elseif ($enfant[0]->sexe == 'fille') {
                $titleColor = 'rgba(244, 241, 187, 0.8)';
            }
            ?>
            <h1 id="titre" style="background-color: <?= $titleColor; ?>;color: white;">Profil
                de votre enfant <?= ucfirst($enfant[0]->prenom); ?> <?= ucfirst($enfant[0]->nom); ?></h1>
            <div class="container" style="text-align: center;">
                <div class="row">
                    <div class="col">
                        <p><span id="underline"> Sa date de naissance :</span> <?= $enfant[0]->birthdate; ?></p>
                    </div>
                    <div class="col">
                        <p><span id="underline"> Son sexe :</span> <?= $enfant[0]->sexe; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php echo '<br><a id="btnEnfant" href="' . $view->path('editEnfant', array($enfant[0]->id_enfant)) . '">Editer le profil</a>'; ?>

                    </div>
                    <div class="col">
                        <?php echo '<br><a id="btnDelete" href="' . $view->path('deleteEnfant', array($enfant[0]->id_enfant)) . '">Supprimer le profil</a>'; ?>
                    </div>
                </div>
            </div>

            <h2 id="sousTitre" style="background-color: <?= $titleColor; ?>;color: white;">Personne(s) responsable(s)
                de <?= ucfirst($enfant[0]->prenom) ?></h2>
            <?php
            echo '<div style="text-align: center"><a id="btnEnfant" href="' . $view->path('ajoutResponsable', array($enfant[0]->id_enfant)) . '">Ajouter une personne responsable</a></div>'; ?>
            <div class="table-responsive">
            <table class="table table-striped" style="width: 80%; margin: 20px 10%;">
                <thead>
                <tr class="table-info">
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Rôle</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"><?= ucfirst($_SESSION['login']['nom']); ?></th>
                    <td><?= ucfirst($_SESSION['login']['prenom']); ?></td>
                    <td>Responsable légal</td>
                    <td></td>
                </tr>
                <?php
                if (!empty($autreResp)) {
                    foreach ($autreResp as $autreRes) {
                        if ($autreRes->role_autre_respons == 'autreFamille') {
                            $role = 'Autre membre de la famille';
                        } elseif ($autreRes->role_autre_respons == 'pere') {
                            $role = 'Père';
                        } elseif ($autreRes->role_autre_respons == 'mere') {
                            $role = 'Mère';
                        } elseif ($autreRes->role_autre_respons == 'grandMere') {
                            $role = 'Grand-mère';
                        } elseif ($autreRes->role_autre_respons == 'grandPere') {
                            $role = 'grand-père';
                        } elseif ($autreRes->role_autre_respons == 'oncle') {
                            $role = 'Oncle';
                        } elseif ($autreRes->role_autre_respons == 'tante') {
                            $role = 'Tante';
                        } elseif ($autreRes->role_autre_respons == 'ami') {
                            $role = 'Ami de la famille';
                        } ?>
                        <tr>
                        <th scope="row"><?= ucfirst($autreRes->nom_autre_respons); ?></th>
                        <td><?= ucfirst($autreRes->prenom_autre_respons); ?></td>
                        <td><?= ucfirst($role); ?></td>
                        <td><a id="btnDelete"
                               href="<?= $view->path('deleteResponsable', array($enfant[0]->id_enfant, $autreRes->id_autre_responsable)) ?>">Supprimer
                                ce responsable</a></td>
                        </tr>
                    <?php
                    }
                }
                ?> </tbody>
            </table>
            </div>
            <div id="sousTitre"><a id="btnRetour" href="<?= $view->path('') ?>">Revenir sur votre profil</a>
            </div>

        <?php } else {
            header('Location: http://localhost/mynursery');
        }
    } else {
        header('Location: http://localhost/mynursery');
    }
} else {
    header('Location: http://localhost/mynursery');
}
