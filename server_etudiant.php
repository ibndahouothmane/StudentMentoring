<head>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<?php
session_start();
$errors = array();
$pseudo = "";
$db = mysqli_connect('localhost', 'root', '', 'projetpfe');


if (isset($_POST['btn_etudiant'])) {

  $pseudo = mysqli_real_escape_string($db, $_POST['pseudo']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
  $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);

  $nom = mysqli_real_escape_string($db, $_POST['nom']);
  $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
  $telephone = mysqli_real_escape_string($db, $_POST['telephone']);
  $sexe = mysqli_real_escape_string($db, $_POST['sexe']);
  $dateNaissance = mysqli_real_escape_string($db, $_POST['dateNaissance']);
  $new_date = date('Y/m/d', strtotime($dateNaissance));
  $ville = mysqli_real_escape_string($db, $_POST['ville']);

  $NomLycee  = mysqli_real_escape_string($db, $_POST['NomLycee']);
  $VilleLycee  = mysqli_real_escape_string($db, $_POST['VilleLycee']);
  $TypeBac  = mysqli_real_escape_string($db, $_POST['TypeBac']);


  $formation1  = mysqli_real_escape_string($db, $_POST['formation1']);
  $formation2  = mysqli_real_escape_string($db, $_POST['formation2']);
  $formation3 = mysqli_real_escape_string($db, $_POST['formation3']);

  if (empty($pseudo)) {
    array_push($errors, "Pseudo est requis");
  }
  if (empty($email)) {
    array_push($errors, "Email est requis");
  }
  if (empty($pass1)) {
    array_push($errors, "Mot de passe est requis");
  }
  if ($pass1 != $pass2) {
    array_push($errors, "Les deux mots de passe ne correspondent pas");
  }

  if (empty($nom)) {
    array_push($errors, "Nom est requis");
  }
  if (empty($prenom)) {
    array_push($errors, "Prenom est requis");
  }
  if (empty($telephone)) {
    array_push($errors, "Telephone est requis");
  }
  if (empty($sexe)) {
    array_push($errors, "Sexe est requis");
  }
  if (empty($dateNaissance)) {
    array_push($errors, "Date de Naissance est requis");
  }
  if (empty($ville)) {
    array_push($errors, "Ville est requis");
  }
  if (empty($NomLycee)) {
    array_push($errors, "Nom du Lycee est requis");
  }
  if (empty($VilleLycee)) {
    array_push($errors, "Ville du Lycee est requis");
  }
  if (empty($TypeBac)) {
    array_push($errors, "Type de Bac est requis");
  }
  if (empty($formation1)) {
    array_push($errors, "Formation 1 est requis");
  }
  if (empty($formation2)) {
    array_push($errors, "Formation 2 est requis");
  }
  if (empty($formation3)) {
    array_push($errors, "Formation 3 est requis");
  }

  $user_check_query = "SELECT * FROM etudiant WHERE pseudo='$pseudo' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  $filename = $_FILES["photo"]["name"];
  $tempname = $_FILES["photo"]["tmp_name"];
  $folder = "images_users/etudiant/" . $filename;

  if ($user) {
    if ($user['pseudo'] === $pseudo) {
      array_push($errors, "Pseudo exist deja");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email exist deja");
    }
  }

  if ($_FILES["photo"]["name"] != '') {


    if (count($errors) == 0) {
      $pass1 = md5($pass1);
      $sql = "INSERT INTO etudiant VALUES('$pseudo', '$email', '$pass1')";
      $sql2 = "INSERT INTO etudiant_info VALUES('$pseudo','$nom', '$prenom', '$new_date','$telephone','$sexe','$ville','$filename')";
      $sql3 = "INSERT INTO etudiant_bac VALUES('$pseudo',	'$NomLycee',	'$VilleLycee',	'$TypeBac')";
      $sql4 = "INSERT INTO etudiant_formation VALUES ('$pseudo', '$formation1','$formation2','$formation3')";

      mysqli_query($db, $sql);
      mysqli_query($db, $sql2);
      mysqli_query($db, $sql3);
      mysqli_query($db, $sql4);
      mysqli_close($db);
      echo '
      <script type="text/javascript">
      
      $(document).ready(function(){
      
        Swal.fire({
                  position: "top",
                  icon: "success",
                  title: "Votre Profil était Bien crée , vous pouvez désormais consultez les mentors et les contacter",
                  showConfirmButton: false,
                  timer: 7000
              })
      });
      
      </script>
      ';
    }
  } else {
    array_push($errors, "photo est requis");
  }
}
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "email est requis");
  }
  if (empty($password)) {
    array_push($errors, "Mot de passe est requis");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM etudiant WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
    $pseudo = $row[0];
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['pseudo'] = $pseudo;
      $_SESSION['success'] = "You are now logged in";
      header('location:index_etudiant.php'); 
    } else {
      array_push($errors, "La combinaison du nom d'utilisateur et du mot de passe est incorrect");
    }
  }
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['pseudo']);
  header('location:login_etudiant.php');
}
