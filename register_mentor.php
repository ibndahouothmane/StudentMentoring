<?php include('server_mentor.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-mentor.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Inscription Mentor</title>
</head>

<body>
    <div class="navbar">
        <label class="logo" href="#">Mentoring</label>
        <ul class="nav-menu">
            <li><a href="index.html">HOME</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#service">Services</a></li>
        </ul>
        <ul class="nav-espace">
            <li><a class="mentor" href="register_mentor.php">ESPACE MENTOR</a></li>
            <li><a class="etudiant" href="register_etudiant.php">ESPACE ETUDIANT</a></li>
        </ul>
        
    </div>
    <div class="titre-mentor">
        <h3>ESPACE MENTOR</h3>
    </div>
    <form action="register_mentor.php" method="post" enctype="multipart/form-data" onsubmit="if(document.getElementById('check').checked) { return true; } else { alert('Veuillez indiquer que vous avez lu et accepté les conditions générales et la politique de confidentialité'); return false; }">
    
        <div class="container">

            <div class="row">

                <div class="col-xl-12">
                
                    <div class="multistep-container">
                    <?php include('errors.php'); ?>
                        <div class="mutistep-form-area">
                       
                            <div class="form-box">
                                <ul class="active-button">
                                    <li class="active">
                                        <span class="round-btn">1</span>
                                    </li>
                                    <li>
                                        <span class="round-btn">2</span>
                                    </li>
                                    <li>
                                        <span class="round-btn">3</span>
                                    </li>
                                    <li>
                                        <span class="round-btn">4</span>
                                    </li>
                                </ul>
                                <h4 id="titre">Creer votre compte</h4>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label" required>Pseudo</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="user2021" id="example-text-input" name="pseudo" value="<?php echo $pseudo ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input" class="col-6 col-form-label">Email</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="email" placeholder="othmane@example.com" id="example-email-input" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="col-6 col-form-label">Mot De passe</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="password" placeholder="Mot De passe" id="example-password-input" name="pass1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="col-6 col-form-label">Confirmation du Mot De passe</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="password" placeholder="Confirmation Mot De passe" id="example-password-input" name="pass2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="" id="check" name="check">
                                                J'accepte<a href="#" style="color: #fd7e14;font-weight:bold">les termes et conditions.</a>.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-11 text-center">
                                        <button type="button" class="social facebook"><i class="fa fa-facebook-official"></i>&nbsp;&nbsp;Continuer avec Facebook</button>
                                        <button type="button" class="social google"></i><i class="fa fa-google"></i>&nbsp;&nbsp;Continuer avec Google</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 text-center">
                                        <a href="login_mentor.php" style="color: red;font-weight: bold;">Deja Inscrit?</a>
                                    </div>
                                </div>
                                <div class="button-row">
                                    <input type="button" value="Suivant" class="next" id="next1">
                                </div>
                            </div>

                            <!-- ----- -->

                            <div class="form-box">
                                <ul class="active-button">
                                    <li class="active">
                                        <span class="round-btn">1</span>
                                    </li>
                                    <li class="active">
                                        <span class="round-btn">2</span>
                                    </li>
                                    <li>
                                        <span class="round-btn">3</span>
                                    </li>
                                    <li>
                                        <span class="round-btn">4</span>
                                    </li>

                                </ul>

                                <h4>Informations Personnelle</h4>


                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Nom</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Idrissi" id="example-text-input" name="nom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Prenom</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="othmane" id="example-text-input" name="prenom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-tel-input" class="col-6 col-form-label">Telephone</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="tel" placeholder="06-55-55-55-55" id="example-tel-input" name="telephone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Sexe</label>
                                    <div class="col-12">
                                        <select id="" class="form-control form-control-sm" name="sexe">
                                            <option selected>Homme</option>
                                            <option>Femme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Date Naissance</label>
                                    <div class="col-12">
                                        <input placeholder="Date Naissance" class="form-control form-control-sm" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date-fin" name="dateNaissance" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Ville</label>
                                    <div class="col-12">
                                        <select id="" class="form-control form-control-sm" name="ville">

                                            <option selected>Agadir</option>
                                            <option>Al Hoceïma</option>
                                            <option>Azilal</option>
                                            <option>Aït Melloul</option>
                                            <option>Benguerir</option>
                                            <option>Benslimane</option>
                                            <option>Berkane</option>
                                            <option>Berrechid</option>
                                            <option>Boulemane</option>
                                            <option>Béni Mellal</option>
                                            <option>Casablanca</option>
                                            <option>Chefchaouen</option>
                                            <option>Chichaoua</option>
                                            <option>Dakhla</option>
                                            <option>El Jadida</option>
                                            <option>Errachidia</option>
                                            <option>Essaouira</option>
                                            <option>Fès</option>
                                            <option>Guelmim</option>
                                            <option>Ifrane</option>
                                            <option>Inzegane</option>
                                            <option>Kalaa Sraghna</option>
                                            <option>Khouribga</option>
                                            <option>Khémisset</option>
                                            <option>Khénifra</option>
                                            <option>Ksar El Kebir</option>
                                            <option>Kénitra</option>
                                            <option>Laayoune</option>
                                            <option>Larache</option>
                                            <option>Marrakech</option>
                                            <option>Meknès</option>
                                            <option>Mohammedia</option>
                                            <option>Nador</option>
                                            <option>Ouarzazate</option>
                                            <option>Oued zem</option>
                                            <option>Oujda</option>
                                            <option>Rabat</option>
                                            <option>Safi</option>
                                            <option>Salé</option>
                                            <option>Sefrou</option>
                                            <option>Settat</option>
                                            <option>Sidi Ifni</option>
                                            <option>Sidi kacem</option>
                                            <option>Tanger</option>
                                            <option>Taounate</option>
                                            <option>Taourirt</option>
                                            <option>Taroudant</option>
                                            <option>Tata</option>
                                            <option>Taza</option>
                                            <option>Tiznit</option>
                                            <option>Témara</option>
                                            <option>Tétouan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Photo</label>
                                    <div class="col-12">
                                        <input type="file" class="form-control-file form-control-sm" id="exampleFormControlFile1" name="photo">
                                    </div>
                                </div>


                                <div class="button-row">
                                    <input style="margin-right:10px" type="button" value="Precedent" class="previous" id="back1">
                                    <input type="button" value="Suivant" class="next" id="next2">
                                </div>


                            </div>

                            <!-- ----- -->

                            <div class="form-box">
                                <ul class="active-button">
                                    <li class="active">
                                        <span class="round-btn">1</span>
                                    </li>
                                    <li class="active">
                                        <span class="round-btn">2</span>
                                    </li>
                                    <li class="active">
                                        <span class="round-btn">3</span>
                                    </li>
                                    <li>
                                        <span class="round-btn">4</span>
                                    </li>

                                </ul>
                                <h4>Parler nous de votre Baccalaureat</h4>



                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Nom Lycee</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Nom Lycee"" id="example-text-input" name="NomLycee">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Ville Lycee</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Ville Lycee" id="example-text-input" name="VilleLycee">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input" class="col-6 col-form-label">Tybe Bac</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Tybe Bac" id="example-text-input" name="TypeBac">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-tel-input" class="col-6 col-form-label">Filiere Bac</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Filiere Bac" id="example-text-input" name="FiliereBac">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="col-6 col-form-label">Mention</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Mention" id="example-text-input" name="Mention">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Date Obtention Bac</label>
                                    <div class="col-12">
                                        <select id="year" class="form-control form-control-sm" name="anneeBac">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Matiere Forte</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Matiere Forte" id="example-text-input" name="MatiereForte">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Matiere Faible</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Matiere Faible" id="example-text-input" name="MatiereFaible">
                                    </div>
                                </div>
                                <div class="button-row">
                                    <input style="margin-right:20px" type="button" value="Precedent" class="previous">
                                    <input type="button" value="Suivant" class="next">
                                </div>


                            </div>

                            <!-- --- -->

                            <div class="form-box">
                                <ul class="active-button">
                                    <li class="active">
                                        <span class="round-btn">1</span>
                                    </li>
                                    <li class="active">
                                        <span class="round-btn">2</span>
                                    </li>
                                    <li class="active">
                                        <span class="round-btn">3</span>
                                    </li>
                                    <li class="active">
                                        <span class="round-btn">4</span>
                                    </li>

                                </ul>


                                <h4>Parler nous de Votre Situation Actuel</h4>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Niveau d'etude actuel</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Niveau d'etude actuel" id="example-text-input" name="NiveauEtude">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input" class="col-6 col-form-label">Etablissement actuel</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Etablissement actuel" id="example-text-input" name="NomEtablissement">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="col-6 col-form-label">Type Etablissement</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Type Etablissement" id="example-text-input" name="TypeEtablissement">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="col-6 col-form-label">Ville Etablissement</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Ville Etablissement" id="example-text-input" name="VilleEtablissement">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Date Debut Formation</label>
                                    <div class="col-12">
                                        <input placeholder="Date Debut Formation" class="form-control form-control-sm" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date-fin" name="DateDebutF" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Date Fin Formation</label>
                                    <div class="col-12">
                                        <input placeholder="Date Fin Formation" class="form-control form-control-sm" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date-fin" name="DateFinF" />
                                    </div>
                                </div>
                                <div class="form-inline">
                                    <label for="example-text-input" class="col-2 col-form-label">En poste</label>
                                    <div class="form-check-inline">
                                        <input onclick="undisableTxt()" class="form-check-input" type="radio" name="exampleRadios" id="oui" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            OUI
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input onclick="disableTxt()" class="form-check-input" type="radio" name="exampleRadios" id="non" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            NON
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="col-6 col-form-label">Nom Entreprise</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Nom Entreprise" id="NomEntreprise" name="NomEntreprise">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="col-6 col-form-label">Secteur</label>
                                    <div class="col-12">
                                        <input class="form-control form-control-sm" type="text" placeholder="Secteur" id="Secteur" name="Secteur">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-6 col-form-label">Date Debut Du travaille</label>
                                    <div class="col-12">
                                        <input placeholder="Date Debut Du travaille" class="form-control form-control-sm" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date-debut-t" name="DateDebutT" />
                                    </div>
                                </div>
                                <div class="button-row">
                                    <input style="margin-right:10px" type="button" value="Precedent" class="previous">
                                    <input type="submit" value="Terminer" class="submit" name="btn_mentor" onclick="">
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div style="margin-top: 100px;">
    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="code.js"></script>
<script>
    var start = 1950;
    var end = new Date().getFullYear();
    var options = "";
    for (var year = start; year <= end; year++) {
        options += "<option>" + year + "</option>";
    }
    document.getElementById("year").innerHTML = options;
</script>
<script>
    function stickyalert() {
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: 'Merci d\'avoir renseigne votre profil Vous pouvez desormais verifie votre agenda et recevoir les demandes d\'etudiants',
            showConfirmButton: false,
            timer: 7000
        })
    }
</script>
<script>
    function disableTxt() {
        document.getElementById("NomEntreprise").disabled = true;
        document.getElementById("Secteur").disabled = true;
        document.getElementById("date-debut-t").disabled = true;

    }

    function undisableTxt() {
        document.getElementById("NomEntreprise").disabled = false;
        document.getElementById("Secteur").disabled = false;
        document.getElementById("date-debut-t").disabled = false;

    }
</script>

</html>