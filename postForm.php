<script type="text/javascript" src="js/geturl.js"></script>
<?PHP
	$type = $_POST['type'];

	if($type == "bug")
	{
		$email="guillaumedocquier@hotmail.com";
		$media = $_POST['media'];
		$modele = $_POST['modele'];
		$navigateur = $_POST['navigateur'];
		$version = $_POST['version'];
		$bugDesc = $_POST['bugDesc'];

		$MailTo = $email; //adresse à laquelle sera envoyé contenu du formulaire
		$MailSubject = "Un rapport de bug de votre site Internet"; //texte qui va figurer dans le champ "sujet" du email
		$MailHeader = "From: contact@velomane.com"; //adresse email qui va figurer dans le champ "expéditeur" du email et qui peut être remplacé par la variable "$champx" ("$champ3").

		$MailBody.= "Rapport de bug: ";
		$MailBody.="\n\n";
		$MailBody.="Média: $media";
		if($modele != "") {
			$MailBody.=" $modele";
		}
		$MailBody.="\n Navigateur: $navigateur";
		if($version != "") {
			$MailBody.=" v.$version";
		}
		$MailBody.="\n\n Description: $bugDesc";
		
		mail($MailTo, $MailSubject, $MailBody, $MailHeader); //envoi du message
	}
	else if($type == "commentaire") {
		$email="guillaumedocquier@hotmail.com";
		$commentaire = $_POST['commentaire'];

		$MailTo = $email; //adresse à laquelle sera envoyé contenu du formulaire
		$MailSubject = "Un commentaire de votre site Internet"; //texte qui va figurer dans le champ "sujet" du email
		$MailHeader = "From: contact@velomane.com"; //adresse email qui va figurer dans le champ "expéditeur" du email et qui peut être remplacé par la variable "$champx" ("$champ3").

		$MailBody.= "$commentaire";

		mail($MailTo, $MailSubject, $MailBody, $MailHeader); //envoi du message
	}
	else if($type == "question" || $type == "contactForm") {
		$email="guillaumedocquier@hotmail.com";
		$mail = $_POST['email'];
		$question = $_POST['question'];

		$MailTo = $email; //adresse à laquelle sera envoyé contenu du formulaire
		$MailSubject = "Une question de votre site Internet"; //texte qui va figurer dans le champ "sujet" du email
		$MailHeader = "From: contact@velomane.com"; //adresse email qui va figurer dans le champ "expéditeur" du email et qui peut être remplacé par la variable "$champx" ("$champ3").
		
		$MailBody.= "Question: $question";
		$MailBody.= "\n";
		$MailBody.= "E-mail: $mail";

		mail($MailTo, $MailSubject, $MailBody, $MailHeader); //envoi du message
	}
	else {
		$email="guillaumedocquier@hotmail.com";

		$MailTo = $email; //adresse à laquelle sera envoyé contenu du formulaire
		$MailSubject = "ERREUR"; //texte qui va figurer dans le champ "sujet" du email
		$MailHeader = "From: contact@velomane.com"; //adresse email qui va figurer dans le champ "expéditeur" du email et qui peut être remplacé par la variable "$champx" ("$champ3").

		$MailBody.= "postForm n'a pas marché! :(";
		$MailBody.= "Type: $type.";

		mail($MailTo, $MailSubject, $MailBody, $MailHeader); //envoi du message
	}
?>
<script language="Javascript">
<!--
var page = getQueryVariable("page");
var type = getQueryVariable("type");
document.location.replace(page + ".html?type=" + type + '#' + type);
// -->
</script>
</body>
</html>